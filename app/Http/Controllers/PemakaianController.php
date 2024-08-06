<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemakaian;
use App\Models\Pelanggan;
use Yajra\DataTables\Facades\DataTables;
use App\Exports\PemakaianExport;
use Maatwebsite\Excel\Facades\Excel;

class PemakaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return DataTables::of(Pemakaian::with('pelanggan')->get())
            ->addColumn('action', function($row){
                $btn = "<a href='/pemakaian/" . $row->id . "/edit' class='btn btn-danger btn-sm ' style='margin-right:5px'><i class='fa fa-edit'></i></a>";
                $btn .= '<button type="button" onclick="alert_delete(\'' . $row->id . '\')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                return $btn;
            })
            ->rawColumns(['action','code'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('pemakaian.index');
    }

    public function getLastMeterAkhir($pelanggan_id)
    {
        $lastData = Pemakaian::where('pelanggan_id', $pelanggan_id)->latest()->first();
        $meter_akhir = $lastData ? $lastData->meter_akhir : 0;

        return response()->json(['meter_akhir' => $meter_akhir]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['pelanggan'] = Pelanggan::pluck('nama','id');
        return view('pemakaian.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required',
            'bulan' => 'required',
            'meter_akhir' => 'required',
            'pakai' => 'required',
        ]);

        $data = Pemakaian::create($request->all());
        $data->save();
        return redirect(route('pemakaian.index'))->with('message','Data berhasil disimpan');
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
        $data['pelanggan'] = Pelanggan::pluck('nama','id');
        $data['pemakaian'] = Pemakaian::findOrFail($id);
        return view('pemakaian.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'pelanggan_id' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'meter_akhir' => 'required',
            'pakai' => 'required',
        ]);

        $data = Pemakaian::findOrFail($id);
        $data->update($request->all());
        return redirect(route('pemakaian.index'))->with('message','Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pemakaian = Pemakaian::findOrFail($id);
        return $pemakaian->delete();
    }

    public function export_excel(){
        $now = date("Y-m-d H:i:s");
        return Excel::download(new PemakaianExport, 'Pemakaian '. $now .'.xlsx');
    }
}
