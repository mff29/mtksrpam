<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use Yajra\DataTables\Facades\DataTables;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return DataTables::of(Asset::all())
            ->addColumn('action', function($row){
                $btn = "<a href='/asset/" . $row->id . "/edit' class='btn btn-danger btn-sm ' style='margin-right:5px'><i class='fa fa-edit'></i></a>";
                $btn .= '<button type="button" onclick="alert_delete(\'' . $row->id . '\')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                return $btn;
            })
            ->rawColumns(['action','code'])
            ->addIndexColumn()
            ->make(true);
        }
        
        return view('asset.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('asset.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'kategori' => 'required',
            'qty' => 'required',
            'jumlah' => 'required',
        ]);

        $data = Asset::create($request->all());
        $data->save();

        return redirect(route('asset.index'));
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
        $data['asset'] = Asset::findOrFail($id);
        return view('asset.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'kategori' => 'required',
            'qty' => 'required',
            'jumlah' => 'required',
        ]);

        $asset = asset::findOrFail($id);
        $asset->update($request->all());

        return redirect(route('asset.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $asset = Asset::findOrFail($id);
        return $asset->delete();
    }
}
