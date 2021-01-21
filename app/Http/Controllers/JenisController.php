<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function list($tipe= 'all')
    {
        $tipe = strtolower($tipe);
        $listTipe = ['tps', 'saintek', 'soshum'];
        if(in_array($tipe, $listTipe)){
            $listJenis = Jenis::where('tipe', $tipe)->get();
        }else{
            $listJenis = Jenis::all();
        }
        
        return view('admin.jenis.list', compact('listJenis'));
    }
    public function BuatJenis(Request $request)
    {
        $jenis = new Jenis;
        $jenis->nama = $request->nama;
        $jenis->tipe = $request->tipe;
        $jenis->save();
        return redirect()->route('admin.jenis.list')->with('sukses', 'Berhasil membuat Jenis');
    }
    public function ShowJenisEditPage(Jenis $jenis)
    {
        return view('admin.jenis.edit', compact('jenis'));
    }
    public function UpdateJenis(Request $request, Jenis $jenis)
    {
        $jenis->nama = $request->nama;
        $jenis->tipe = $request->tipe;
        $jenis->save();
        return redirect()->route('admin.jenis.list')->with('sukses', 'Berhasil mengupdate Jenis');
    }
    public function HapusJenis(Jenis $jenis)
    {
        $jenis->delete();
        return back()->with('sukses', 'Berhasil Menghapus Jenis');
    }

}
