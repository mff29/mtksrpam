<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['pelanggan'] = Pelanggan::all();

        return view('dashboard',$data);
    }
}
