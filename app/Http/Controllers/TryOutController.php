<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Jenis;
use App\Models\Nilai;
use App\Models\Paket;
use App\Models\Progress;
use App\Models\Soal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TryOutController extends Controller
{
    private function getTipePaket($progressTipe)
    {
        switch ($progressTipe) {
            case 0:
                return 'tps';
            case 1:
                return 'saintek';
            case 2:
                return 'soshum';
        }
    }
   public function pilihSesi()
   {
        $progress = Auth::user()->progress;
        $tipe = $this->getTipePaket($progress->tipe);
        switch ($progress->status) {
            case 0:
                    $paket = Paket::where([
                        ['sesi_id', $progress->sesi_id],
                        ['tipe', $tipe]
                    ])->first();
                    $progress->paket_id = $paket->id;
                    $progress->save();
                    return view('Pengerjaan.tps', compact('paket'));
            case 2:
                    $listPaket = Paket::where([
                        ['sesi_id', $progress->sesi_id],
                        ['tipe', '!=', $tipe]
                    ])->get();
                    return view('Pengerjaan.tpa', compact('progress', 'listPaket'));
            default:
                    return redirect()->route('user.pengerjaan.doing');
                break;
        }
   }
   public function Pengerjaan(Request $request, $no = 1)
   {
       $user = Auth::user();
       $progress = $user->progress;
       switch ($progress->status) {
           case 0:
                $paket = $progress->paket;
                $progress->start_time = now()->getPreciseTimestamp(3);
                $progress->stop_time = now()->addMinutes($paket->waktu)->getPreciseTimestamp(3);
                $progress->status = 1;
                $progress->save();
                $tipe = $this->getTipePaket($progress->tipe);
                $listJenis = Jenis::where('tipe', $tipe)->get();
                $arrAnswer = [];
                foreach ($listJenis as $jenis) {
                    $listSoal = Soal::where([
                        ['jenis_id', $jenis->id],
                        ['paket_id', $progress->paket_id]
                    ])->inRandomOrder()->get();
                    foreach($listSoal as $soal){
                        $answer = new Answer;
                        $answer->user_id = $user->id;
                        $answer->progress_id = $progress->id;
                        $answer->soal_id = $soal->id;
                        $answer->tipe = $progress->tipe;
                        $answer->no = $no;
                        $answer->save();
                        $arrAnswer[] = $answer;
                        if($no == 1){
                            $currentSoal = $soal;
                            $currentAnswer = $answer;
                        }
                        $no++;
                    }

                }
                $answers = collect($arrAnswer);
                $no = 1;
               break;
           
            case 1:
                if($progress->stop_time < now()->getPreciseTimestamp(3)){
                    return redirect()->route('user.dashboard');
                }
                $currentAnswer = Answer::where([
                    ['no', $no],
                    ['tipe', $progress->tipe],
                    ['user_id', Auth::id()]
                ])->first();
                $currentSoal = $currentAnswer->soal;
                $answers = Answer::where([
                    ['progress_id', $progress->id],
                    ['tipe', $progress->tipe],
                    ['user_id', Auth::id()]
                ])->get();
            break;

            case 2:
                $pilihanTipe = $request->pilihanTipe ?? 'saintek';
                $paket = Paket::where([
                    ['tipe', $pilihanTipe],
                    ['sesi_id', $progress->sesi_id]
                ])->first();
                $progress->tipe = $pilihanTipe == 'saintek' ? 1 : 2;
                $progress->status = 3;
                $progress->stop_time = now()->addMinutes($paket->waktu)->getPreciseTimestamp(3);
                $progress->paket_id = $paket->id;
                $progress->save();
                $listJenis = Jenis::where('tipe', $pilihanTipe)->get();
                $arrAnswer = [];
                foreach ($listJenis as $jenis) {
                    $listSoal = Soal::where('jenis_id', $jenis->id)->inRandomOrder()->get();
                    foreach($listSoal as $soal){
                        $answer = new Answer;
                        $answer->user_id = $user->id;
                        $answer->progress_id = $progress->id;
                        $answer->soal_id = $soal->id;
                        $answer->tipe = $progress->tipe;
                        $answer->no = $no;
                        $answer->save();
                        $arrAnswer[] = $answer;
                        if($no == 1){
                            $currentSoal = $soal;
                            $currentAnswer = $answer;
                        }
                        $no++;
                    }
                }
                $no = 1;
                $answers = collect($arrAnswer);
            break;
            case 3:
                if($progress->stop_time < now()->getPreciseTimestamp(3)){
                    return redirect()->route('user.dashboard');
                }
                $currentAnswer = Answer::where([
                    ['no', $no],
                    ['tipe', $progress->tipe],
                    ['progress_id', $progress->id],
                ])->first();
                $currentSoal = $currentAnswer->soal;
                $answers = Answer::where([
                    ['progress_id', $progress->id],
                    ['tipe', $progress->tipe],
                ])->get();
            break;
           default:
               return redirect()->route('user.dashboard');
               break;
       }
       return view('Pengerjaan.pengerjaan', compact('answers', 'currentSoal', 'progress', 'no', 'currentAnswer'));
   }
   public function SaveAnswer(Request $request)
   {
        $user = User::where('id', Auth::id())->first();
        $progress = $user->progress;
        $currentAnswer = Answer::where([
            ['tipe',$request->currentTipe],
            ['progress_id', $progress->id],
            ['no', $request->currentNumber]
        ])->firstOrFail();

        $currentAnswer->value = $request->jawaban;
        $currentAnswer->save();
        
        switch ($request->GantiNo) {
            case 'next':
                $nextNumber = $request->currentNumber + 1;
                break;
            case 'prev':
                $nextNumber = $request->currentNumber - 1;
                break;
            case 'save':
                $nextNumber = 'Save';
                break;
            default:
                $nextNumber = $request->GantiNo;
                break;
        }
        
        if($nextNumber == 'Save' || $progress->stop_time <= now()->getPreciseTimestamp(3)){
            if($progress->status == 1){
                $progress->status = 2;
                $progress->stop_time = now()->addMinutes(5)->getPreciseTimestamp(3);
                $progress->save();
                $user->status = 2;
                $user->save();
                return redirect()->route('user.pengerjaan.persiapan');
            }else{
                $progress->status = 4;
                $progress->save();
                $user->status = 3;
                $user->save();
                return redirect()->route('user.dashboard');   
            }
        }
        return redirect()->route('user.pengerjaan.doing', $nextNumber);

   }
}
