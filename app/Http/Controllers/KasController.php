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
        $data['pendapatan_kas'] = Kas::where('tipe','PENDAPATAN')->sum('nominal');
        $data['pengeluaran_kas'] = Kas::where('tipe','PENGELUARAN')->sum('nominal');
        $data['jumlah_kas'] = $data['pendapatan_kas'] - $data['pengeluaran_kas'];
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


        $data = Kas::create($request->all());
        $data->save();

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
        $data['kas'] = Kas::findOrFail($id);
        return view('kas.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tipe' => 'required',
            'deskripsi' => 'required',
            'nominal' => 'required|numeric',
        ]);

        $kas = Kas::findOrFail($id);
        $kas->update($request->all());
    
        return redirect(route('kas.index'))->with('message', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kas = Kas::findOrFail($id);
        return $kas->delete();
    }
}
