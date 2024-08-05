<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tagihan;

class KasController extends Controller
{
    public function index(){
        $data['pemasukan'] = Tagihan::where('status', 'lunas')->sum('tagihan');
        return view('kas.index',$data);
    }
}
