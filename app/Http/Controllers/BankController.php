<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;
use Yajra\DataTables\Facades\DataTables;
use App\Exports\BankExport;
use Maatwebsite\Excel\Facades\Excel;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return DataTables::of(Bank::all())
            ->addColumn('action', function($row){
                $btn = "<a href='/bank/" . $row->id . "/edit' class='btn btn-danger btn-sm ' style='margin-right:5px'><i class='fa fa-edit'></i></a>";
                $btn .= '<button type="button" onclick="alert_delete(\'' . $row->id . '\')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                return $btn;
            })
            ->rawColumns(['action','code'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('bank.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bank.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_bank' => 'required',
            'nomor_rekening' => 'required|unique:bank,nomor_rekening',
            'nama_rekening' => 'required',
        ]);

        $data = Bank::create($request->all());
        $data->save();

        return redirect(route('bank.index'));
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
        $data['bank'] = Bank::findOrFail($id);
        return view('bank.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'jenis_bank' => 'required',
            'nomor_rekening' => 'required',
            'nama_rekening' => 'required',
        ]);
        $bank = Bank::findOrFail($id);
        $bank->update($request->all());

        return redirect(route('bank.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bank = Bank::findOrFail($id);
        return $bank->delete();
    }

    public function export_excel(){
        $now = date("Y-m-d H:i:s");
        return Excel::download(new BankExport, 'Bank '. $now .'.xlsx');
    }
}
