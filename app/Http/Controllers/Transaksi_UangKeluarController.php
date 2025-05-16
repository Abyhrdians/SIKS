<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Transaksi_UangKeluarController extends Controller
{
    //
    public function index(){
        return view('Admin.Transaksi.Uang-Keluar.index');
    }
}
