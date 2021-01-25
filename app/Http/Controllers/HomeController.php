<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Nilai;
use App\Models\Progress;
use App\Models\Sesi;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function ShowHome()
    {
        return view('home');
    }
    public function ShowNilaiSoshum()
    {
        $nilais = Nilai::whereHas('progress', function(Builder  $query){
            $query->where('tipe', 2);
        })->with('user')->orderBy('value', 'desc')->get();
        $title = 'Soshum';
        return view('LeaderBoard.nilai', compact('nilais', 'title'));
    }
    public function ShowNilaiSaintek()
    {
        $nilais = Nilai::whereHas('progress', function(Builder  $query){
            $query->where('tipe', 1);
        })->with('user')->orderBy('value', 'desc')->get();
        $title = 'Saintek';
        return view('LeaderBoard.nilai', compact('nilais', 'title'));
    }
    public function ShowDashboard()
    {
        $user = User::where('id', Auth::id())->first();
        if($user->status == 0){
            $user->status= 1;
            $user->save();
        }
        $nilai = Nilai::where('user_id',$user->id)->first();
        $progress = $user->progress;
        $show = $progress->status == 4;
        $answers = Answer::where([
            ['user_id',$user->id],
        ])->with(['soal.options'])->get();
        return view('dashboard', compact('nilai', 'answers', 'show'));
    }

    public function ShowTermOfReference()
    {
        $sesi = Auth::user()->progress->sesi;
        return view('termofref', compact('sesi'));
    }
   public function upload(Request $request){
       
        $file = $request->file('file');
        $ekstensi_diperbolehkan	= array('png','jpg','jpeg');
        $ekstensi =strtolower($file->extension());
        $azureURL =env('AZURE_STORAGE_URL').env('AZURE_STORAGE_CONTAINER')."/";
        $fileName = time().'_'.$request->file->getClientOriginalName();
        if((in_array($ekstensi, $ekstensi_diperbolehkan) === true ) && ($file->getSize() < 5242880)){
            $filePath = $file->storeAs('/soal', $fileName, 'azure');
            if($filePath)
                return response()->json(
                    [
                        "uploaded"=>1,
                        "fileName"=>$fileName,
                        'location'=>$azureURL.$filePath,
                    ],200);
            else
                return response()->json(
                    [
                    "uploaded"=>0,
                    "error"=>[
                        "message"=> "Shit Happen!"
                    ]
                    ],401);
        }
        else{
            if($file->getSize() > 5242880)
                return response()->json(
                    [
                    "uploaded"=>1,
                    "error"=>[
                        "message"=> "ukurannya kebesaran boss"
                    ]
                    ],400);
            else
                return response()->json(
                    [
                    "uploaded"=>1,
                    "error"=>[
                        "message"=> "tolong upload cuma gambar ya"
                    ]
                    ],401);
        }

    }
}
