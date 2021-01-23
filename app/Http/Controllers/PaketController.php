<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Opsi;
use App\Models\Paket;
use App\Models\Sesi;
use App\Models\Soal;
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
    public function ShowSoalPage(Paket $paket)
    {
        $listJenis = Jenis::where('tipe', $paket->tipe)->get();
        $listSoal = Soal::where('paket_id', $paket->id)->orderBy('no', 'asc')->get();
        return view('admin.paket.soal', compact('paket','listJenis', 'listSoal'));
    }
    public function SaveSoal(Paket $paket, Request $request)
    {
        $arrOpsi = ['A', 'B', 'C', 'D', 'E'];
        $soal = new Soal;
        $soal->no = $request->no;
        $soal->paket_id = $paket->id;
        $soal->jenis_id = $request->jenis;
        $soal->body = $request->soal;
        $soal->answer = $request->jawaban;
        $soal->save();
        for ($i=0; $i < (2+$request->jmlOpsi) ; $i++) { 
            $opsi = new Opsi;
            $opsi->soal_id = $soal->id;
            $opsi->body = $request->input("opsi_".$arrOpsi[$i]);
            $opsi->tipe = $arrOpsi[$i];
            $opsi->save();
        }
        return redirect()->route('admin.paket.soal.tambah', $paket->id)->with('sukses', 'Berhasil Menambahkan soal');
    }
    public function editSoalPage(Soal $soal)
    {
        $listJenis = Jenis::where('tipe', $soal->paket->tipe)->get();
        $listOpsi = Opsi::where('soal_id', $soal->id)->orderBy('tipe')->get();
        return view('admin.paket.editSoal', compact('listJenis', 'soal', 'listOpsi'));
    }
    public function HapusSoal(Soal $soal)
    {

        foreach ($soal->options as $opsi) {
            $opsi->delete();
        }
        foreach ($soal->answers as $answer) {
            $answer->delete();
        }
        $soal->delete();
        return back()->with('sukses', 'berhasil menghapus soal');
    }
    public function updateSoal(Soal $soal, Request $request)
    {
        $opsiTambah = $request->opsiTambah ? explode(',',$request->opsiTambah ) : [];
        $opsiKurang = $request->opsiKurang ? explode(',', $request->opsiKurang) : [];
        $listOpsi = Opsi::where('soal_id', $soal->id)->get();
        foreach ($listOpsi as $opsi) {
            if(in_array($opsi->tipe, $opsiKurang)){
                $opsi->delete();
                continue;
            }
            $opsi->body = $request->input('opsi_'.$opsi->tipe);
            $opsi->save();
        }
        foreach ($opsiTambah as $newOpsi) {
            $opsi = new Opsi;
            $opsi->body = $request->input('opsi_'.$newOpsi);
            $opsi->soal_id = $soal->id;
            $opsi->tipe = $newOpsi;
            $opsi->save();
        }
        $soal->body = $request->soal;
        $soal->answer = $request->jawaban;
        $soal->jenis_id = $request->jenis;
        $soal->save();
        return redirect()->route('admin.paket.soal.tambah', $soal->paket_id)->with('sukses', 'berhasil mengupdate soal');
    }
}
