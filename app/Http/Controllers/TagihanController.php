<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tagihan;
use App\Models\Pelanggan;
use App\Models\Abonemen;
use App\Models\Pemakaian;
use Yajra\DataTables\Facades\DataTables;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return DataTables::of(Tagihan::with('pelanggan','pemakaian','abonemen')->get())
            ->addColumn('action', function($row){
                $btn = "<a href='/tagihan/" . $row->id . "/edit' class='btn btn-danger btn-sm ' style='margin-right:5px'><i class='fa fa-edit'></i></a>";
                $btn .= '<button type="button" onclick="alert_delete(\'' . $row->id . '\')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                return $btn;
            })
            ->addColumn('pemakaian', function ($row) {
                return $row->pemakaian->bulan . ' ' . $row->pemakaian->tahun;
            })
            ->rawColumns(['action','status','code'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('tagihan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['pelanggans'] = Pelanggan::all();
        $data['abonemens'] = Abonemen::all();
        $data['pemakaians'] = Pemakaian::all();
        return view('tagihan.create', $data);

        // return view('tagihan.buat', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required',
            'pemakaian_id' => 'required||exists:pemakaian,id|unique:tagihan,pemakaian_id',
            'abonemen_id' => 'required',
            'harga_per_meter' => 'required',
            'jumlah_pakai' => 'required',
            'tagihan' => 'required',
            'jenis_bayar' => 'required',
            'status' => 'required',
        ]);
        if (Tagihan::where('pemakaian_id', $request->pemakaian_id)->exists()) {
            return redirect()->back()->withErrors([
                'pemakaian_id' => 'Tagihan bulan tersebut sudah terinput!'
            ])->withInput();
        }

        Tagihan::create($request->all());
        
        return redirect()->route('tagihan.index')->with('success', 'Tagihan berhasil ditambahkan.');
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
        $data['pelanggans'] = Pelanggan::all();
        $data['abonemens'] = Abonemen::all();
        $data['pemakaians'] = Pemakaian::all();
        $data['tagihan'] = Tagihan::findOrFail($id);
        
        return view('tagihan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function updateStatus(Request $request, $id)
{
    $tagihan = Tagihan::find($id);
    $tagihan->status = $request->status;
    $tagihan->save();

    return response()->json(['success' => true]);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
