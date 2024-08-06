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

        $data['total_pendapatan'] = Kas::sum('nominal_pendapatan');
        $data['total_pengeluaran'] = Kas::sum('nominal_pengeluaran');
        $data['jumlah_kas'] = $data['total_pendapatan'] - $data['total_pengeluaran'];
        
        $data['pendapatan_air'] = Tagihan::where('status','lunas')->sum('tagihan');
        $data['total_uang_kas'] = $data['jumlah_kas'] + $data['pendapatan_air'];

        $data['belum_lunas'] = Tagihan::where('status','belum lunas')->count('tagihan');
        
        return view('dashboard',$data);
    }
}
