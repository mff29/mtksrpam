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

        return view('dashboard',$data);
    }
}
