<?php

namespace App\Http\Controllers;

use App\Models\Sesi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SesiController extends Controller
{
    private function GetTimeStampFromDate(String $date)
    {
        return Carbon::createFromFormat('Y-m-d\TH:i',$date)->getPreciseTimestamp(3);
    }
    public function ListSesi()
    {
        $ListSesi = Sesi::all();
        return view('admin.sesi.list', compact('ListSesi'));
    }
    public function BuatSesiPage()
    {
        return view('admin.sesi.buat');
    }
    public function BuatSesi(Request $request)
    {
    
       $startDate =$this->GetTimeStampFromDate($request->start_time) ;
       $endtDate =$this->GetTimeStampFromDate($request->end_time) ;
       $Sesi = new Sesi;
       $Sesi->nama = $request->nama;
       $Sesi->start_time = $startDate;
       $Sesi->end_time = $endtDate;
       $Sesi->save();
       return redirect()->route('admin.listSesi')->with('sukses', 'Berhasil Membuat Sesi');
    }
    public function updateSesi(Request $request, Sesi $sesi)
    {
        $startDate =$this->GetTimeStampFromDate($request->start_time) ;
        $endtDate =$this->GetTimeStampFromDate($request->end_time) ;
        $sesi->nama = $request->nama;
        $sesi->start_time = $startDate;
        $sesi->end_time = $endtDate;
        $sesi->save();
        return redirect()->route('admin.listSesi')->with('sukses', 'Berhasil Mengupdate Sesi');

    }
    public function editSesiPage(Sesi $sesi)
    {
        return view('admin.sesi.edit', compact('sesi'));
    }   
    public function HapusSesi(Sesi $sesi)
    {
        $sesi->delete();
        return back()->with('sukses', 'berhasil menghapus sesi');
    }
}
