<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\Tagihan;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['pelanggan'] = Pelanggan::all();
        $data['tagihan_lunas'] = Tagihan::where('status','lunas')->count('tagihan');
        $data['belum_lunas'] = Tagihan::where('status','belum lunas')->count('tagihan');
        $data['uang_air'] = Tagihan::where('status','lunas')->sum('tagihan');
        
        return view('dashboard',$data);
    }
}
