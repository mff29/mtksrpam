<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;
use Yajra\DataTables\Facades\DataTables;
use App\Exports\WalletExport;
use Maatwebsite\Excel\Facades\Excel;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return DataTables::of(Wallet::all())
            ->addColumn('action', function($row){
                $btn = "<a href='/wallet/" . $row->id . "/edit' class='btn btn-danger btn-sm ' style='margin-right:5px'><i class='fa fa-edit'></i></a>";
                $btn .= '<button type="button" onclick="alert_delete(\'' . $row->id . '\')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                return $btn;
            })
            ->rawColumns(['action','code'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('wallet.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wallet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required',
            'nomor_rekening' => 'required|unique:wallet,nomor_rekening',
            'nama_rekening' => 'required',
        ]);

        $data = Wallet::create($request->all());
        $data->save();

        return redirect(route('wallet.index'));
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
        $data['wallet'] = Wallet::findOrFail($id);
        return view('wallet.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'jenis' => 'required',
            'nomor_rekening' => 'required',
            'nama_rekening' => 'required',
        ]);
        $Wallet = Wallet::findOrFail($id);
        $Wallet->update($request->all());

        return redirect(route('wallet.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $wallet = Wallet::findOrFail($id);
        return $wallet->delete();
    }

    public function export_excel(){
        $now = date("Y-m-d H:i:s");
        return Excel::download(new WalletExport, 'Wallet '. $now .'.xlsx');
    }
}
