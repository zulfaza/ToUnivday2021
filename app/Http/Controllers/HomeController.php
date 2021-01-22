<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Nilai;
use App\Models\Progress;
use App\Models\Sesi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function ShowHome()
    {
        return view('home');
    }

    public function ShowDashboard()
    {
        $user = Auth::user();
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
    public function cobaUpload()
    {
        return view('admin.cobaupload');
    }
    public function fileUpload(Request $req){

        if($req->file()) {
            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('soal/', $fileName, 'azure');
            dd($filePath);
        }else{
            dd($req);
        }
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
