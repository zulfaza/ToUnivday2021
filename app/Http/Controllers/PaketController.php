<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Sesi;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function ShowListPaket()
    {
        $listPaket = Paket::with('sesi')->get();
        return view('admin.paket.list', compact('listPaket'));
    }
    public function BuatPaketPage()
    {
        $listSesi = Sesi::all();
        return view('admin.paket.buat', compact('listSesi'));
    }

    public function BuatPaket(Request $request)
    {
        $paket = new Paket;
        $paket->name = $request->nama;
        $paket->waktu = $request->waktu;
        $paket->tipe = $request->tipe;
        $paket->sesi_id = $request->sesi;
        $paket->save();
        return redirect()->route('admin.paket.list')->with('sukses', 'Berhasil membuat Sesi');
    }

    public function EditPaketPage(Paket $paket)
    {
        $listSesi = Sesi::all();
        return view('admin.paket.edit', compact('paket','listSesi'));
    }
    public function editPaket(Request $request, Paket $paket)
    {
        $paket->name = $request->nama;
        $paket->waktu = $request->waktu;
        $paket->tipe = $request->tipe;
        $paket->sesi_id = $request->sesi;
        $paket->save();
        return redirect()->route('admin.paket.list')->with('sukses','Berhasil Mengupdate Paket');
    }
    public function HapusPaket(Paket $paket)
    {
        $paket->delete();
        return back()->with('sukses','Berhasil menghapus');
    }
}
