<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\Tagihan;
use App\Models\Kas;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['pelanggan'] = Pelanggan::all();

        $data['pendapatan_kas'] = Kas::where('tipe','PENDAPATAN')->sum('nominal');
        $data['pengeluaran_kas'] = Kas::where('tipe','PENGELUARAN')->sum('nominal');
        $data['jumlah_kas'] = $data['pendapatan_kas'] - $data['pengeluaran_kas'];
        
        $data['pendapatan_air'] = Tagihan::where('status','lunas')->sum('tagihan');
        $data['total_uang_kas'] = $data['jumlah_kas'] + $data['pendapatan_air'];

        $data['belum_lunas'] = Tagihan::where('status','belum lunas')->count('tagihan');
        
        return view('dashboard',$data);
    }
}
