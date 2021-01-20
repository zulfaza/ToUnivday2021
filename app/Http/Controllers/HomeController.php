<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function ShowHome()
    {
        return view('home');
    }
    public function ShowTermOfReference()
    {
        return view('termofref');
    }
    public function cobaUpload()
    {
        return view('admin.cobaupload');
    }
    public function fileUpload(Request $req){

        if($req->file()) {
            $fileName = time().'_'.$req->file->getClientOriginalName();
            // save file to azure blob virtual directory uplaods in your container
            $filePath = $req->file('file')->storeAs('uploads/', $fileName, 'azure');
            dd($filePath);
        }else{
            dd($req);
        }
   }
}
