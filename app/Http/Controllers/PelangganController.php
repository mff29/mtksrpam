<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use Yajra\DataTables\Facades\DataTables;
use App\Exports\PelangganExport;
use Maatwebsite\Excel\Facades\Excel;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Pelanggan::all())
            ->addColumn('action', function ($row) {
                $btn = "<a href='/pelanggan/" . $row->id . "/edit' class='btn btn-danger btn-sm ' style='margin-right:5px'><i class='fa fa-edit'></i></a>";
                $btn .= '<button type="button" onclick="alert_delete(\'' . $row->id . '\')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                // $btn .= '<a class="btn btn-danger btn-sm" href="/pelanggan/' . $row->id . '/edit"><i class="fa fa-eye"></i></a>';
                return $btn;
            })
            ->rawColumns(['action','code'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('pelanggan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode'  => 'required|unique:pelanggan',
            'nama'  => 'required',
            'no_hp'  => 'required',
            'desa'  => 'required',
            'rt'  => 'required',
            'rw'  => 'required',
            'status'  => 'required',
        ]);

        $data = Pelanggan::create($request->all());
        $data->save();

        return redirect(route('pelanggan.index'))->with('message','Data Pelanggan berhasil disimpan!');
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
        $data['pelanggan'] = Pelanggan::findOrFail($id);
        return view('pelanggan.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode'  => 'required',
            'nama'  => 'required',
            'no_hp'  => 'required',
            'desa'  => 'required',
            'rt'  => 'required',
            'rw'  => 'required',
            'status'  => 'required',
        ]);

        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update($request->all());

        return redirect(route('pelanggan.index'))->with('message','Data Pelanggan berhasil di Perbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return $pelanggan->delete();
    }

    public function export_excel(){
        date_default_timezone_set('Asia/Jakarta');
        $now = date("Y-m-d H:i:s");
        return Excel::download(new PelangganExport, 'Pelanggan '. $now .'.xlsx');
    }
}
