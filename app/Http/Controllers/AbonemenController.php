<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Abonemen;
use Yajra\DataTables\Facades\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AbonemenExport;

class AbonemenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return DataTables::of(Abonemen::all())
            ->addColumn('action', function($row){
                $btn = "<a href='/abonemen/" . $row->id . "/edit' class='btn btn-danger btn-sm ' style='margin-right:5px'><i class='fa fa-edit'></i></a>";
                $btn .= '<button type="button" onclick="alert_delete(\'' . $row->id . '\')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                return $btn;
            })
            ->rawColumns(['action','code'])
            ->addIndexColumn()
            ->make(true);
        }
        
        return view('abonemen.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('abonemen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'level' => 'required',
            'harga' => 'required',
            'administrasi' => 'required',
            'keterlambatan' => 'required',
        ]);

        $data = Abonemen::create($request->all());
        $data->save();

        return redirect(route('abonemen.index'));
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
        $data['abonemen'] = Abonemen::findOrFail($id);
        return view('abonemen.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'level' => 'required',
            'harga' => 'required',
            'administrasi' => 'required',
            'keterlambatan' => 'required',
        ]);

        $data = Abonemen::findOrFail($id);
        $data->update($request->all());

        return redirect(route('abonemen.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $abonemen = Abonemen::findOrFail($id);
        return $abonemen->delete();
    }

    public function export_excel(){
        date_default_timezone_set('Asia/Jakarta');
        $now = date("Y-m-d H:i:s");
        return Excel::download(new AbonemenExport, 'Abonemen '. $now .'.xlsx');
    }
}
