<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function ShowListPaket()
    {
        $listPaket = Paket::all();
        return view('admin.paket.list', compact('listPaket'));
    }
}
