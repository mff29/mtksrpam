<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use App\Models\Abonemen;
use App\Models\Pelanggan;
use App\Models\Pemakaian;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RiwayatTagihanExport;
use Yajra\DataTables\Facades\DataTables;

class RiwayatTagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return DataTables::of(Tagihan::with('pelanggan','pemakaian','abonemen')->where('status','LUNAS')->orderBy('updated_at', 'desc')->get())
            ->addColumn('action', function($row){
                $btn = "<a href='/riwayat-tagihan/invoice/" . $row->id . "' class='btn btn-danger btn-sm ' style='margin-right:5px'><i class='bi bi-printer-fill'></i></a>";
                return $btn;
            })
            ->addColumn('pemakaian', function ($row) {
                return $row->pemakaian->bulan ?? 'N/A';
            })
            ->rawColumns(['action','status','code'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('riwayat-tagihan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    public function cetak_invoice(string $id)
    {
        $data['invoice'] = Tagihan::findOrFail($id);

        // Load view untuk PDF dan kirim data
        $pdf = Pdf::loadView('riwayat-tagihan.invoice', $data)->setPaper('A5', 'landscape');

        // Export dan unduh PDF
        return $pdf->stream('laporan.pdf');
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

    public function export_excel(){
        $now = date("Y-m-d H:i:s");
        return Excel::download(new RiwayatTagihanExport, 'Riwayat Tagihan '. $now .'.xlsx');
    }
}
