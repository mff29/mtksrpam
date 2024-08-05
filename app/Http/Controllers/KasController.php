<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tagihan;
use App\Models\Kas;
use Yajra\DataTables\Facades\DataTables;

class KasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['total_pendapatan'] = Kas::sum('nominal_pendapatan');
        $data['total_pengeluaran'] = Kas::sum('nominal_pengeluaran');
        $data['jumlah_kas'] = $data['total_pendapatan'] - $data['total_pengeluaran'];
        $data['pendapatan_air'] = Tagihan::where('status','lunas')->sum('tagihan');
        $data['total_uang_kas'] = $data['jumlah_kas'] + $data['pendapatan_air'];
        $data['kas'] = Kas::all();

        if($request->ajax()){
            return DataTables::of($data['kas'])
            ->addColumn('action', function($row){
                $btn = "<a href='/kas/" . $row->id . "/edit' class='btn btn-danger btn-sm ' style='margin-right:5px'><i class='fa fa-edit'></i></a>";
                $btn .= '<button type="button" onclick="alert_delete(\'' . $row->id . '\')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                return $btn;
            })
            ->rawColumns(['action','code'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('kas.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipe' => 'required',
            'deskripsi' => 'required',
            'nominal' => 'required',
        ]);

        $data = $request->all();
        if ($data['tipe'] == 'pendapatan') {
            $data['nominal_pendapatan'] = $data['nominal'];
            $data['nominal_pengeluaran'] = 0;
        } else {
            $data['nominal_pengeluaran'] = $data['nominal'];
            $data['nominal_pendapatan'] = 0;
        }

        Kas::create($data);

        return redirect(route('kas.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
