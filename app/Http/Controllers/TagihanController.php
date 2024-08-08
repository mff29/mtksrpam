<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use App\Models\Abonemen;
use App\Models\Pelanggan;
use App\Models\Pemakaian;
use Illuminate\Http\Request;
use App\Exports\TagihanExport;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return DataTables::of(Tagihan::with('pelanggan','pemakaian','abonemen')->where('status','PENDING')->get())
            ->addColumn('action', function($row){
                // $btn = "<a href='/tagihan/" . $row->id . "/edit' class='btn btn-danger btn-sm ' style='margin-right:5px'>bayar<i class='fa fa-edit'></i></a>";
                // $btn = "<a href='/tagihan/" . $row->id . "/edit' class='btn btn-info btn-sm ' style='margin-right:5px'>bayar</a>";
                $btn = "<a href='/tagihan/" . $row->id . "/pembayaran' class='btn bg-blue btn-sm '>BAYAR</a>";
                // $btn .= '<button type="button" onclick="alert_delete(\'' . $row->id . '\')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                return $btn;
            })
            ->addColumn('pemakaian', function ($row) {
                return $row->pemakaian->bulan ?? 'N/A';
            })
            ->rawColumns(['action','status','code'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('tagihan.index');
    }

    public function getAbonemenDetails($id)
    {
        $abonemen = Abonemen::find($id);

        if (!$abonemen) {
            return response()->json(['error' => 'Abonemen not found'], 404);
        }

        return response()->json([
            'harga' => $abonemen->harga,
            'administrasi' => $abonemen->administrasi,
            'denda_keterlambatan' => $abonemen->denda_keterlambatan
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['pelanggans'] = Pelanggan::all();
        $data['pemakaians'] = Pemakaian::all();
        $data['abonemens'] = Abonemen::all();
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

        $pemakaian = Pemakaian::find($request->pemakaian_id);
        if ($pemakaian) {
            $pemakaian->status = $request->status; // Mengatur status pemakaian dengan nilai status tagihan
            $pemakaian->save();
        }
        
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
        $request->validate([
            'pelanggan_id' => 'required',
            'pemakaian_id' => 'required|exists:pemakaian,id|unique:tagihan,pemakaian_id,'.$id,
            'abonemen_id' => 'required',
            'harga_per_meter' => 'required|numeric',
            'jumlah_pakai' => 'required|numeric',
            'administrasi' => 'required|numeric',
            'denda_keterlambatan' => 'required|numeric',
            'tagihan' => 'required|numeric',
            'jenis_bayar' => 'required',
            'status' => 'required',
        ]);

        $tagihan = Tagihan::findOrFail($id);

        if (Tagihan::where('pemakaian_id', $request->pemakaian_id)->where('id', '!=', $id)->exists()) {
            return redirect()->back()->withErrors([
                'pemakaian_id' => 'Tagihan untuk pemakaian ini sudah ada!'
            ])->withInput();
        }

        $tagihan->update([
            'pelanggan_id' => $request->pelanggan_id,
            'pemakaian_id' => $request->pemakaian_id,
            'abonemen_id' => $request->abonemen_id,
            'harga_per_meter' => $request->harga_per_meter,
            'jumlah_pakai' => $request->jumlah_pakai,
            'administrasi' => $request->administrasi,
            'telat' => $request->telat,
            'denda_keterlambatan' => $request->denda_keterlambatan,
            'tagihan' => $request->tagihan,
            'jenis_bayar' => $request->jenis_bayar,
            'status' => $request->status,
        ]);

        $pemakaian = Pemakaian::find($request->pemakaian_id);
        if ($pemakaian) {
            $pemakaian->status = $request->status; // Mengatur status pemakaian dengan nilai status tagihan
            $pemakaian->update();
        }

        return redirect()->route('tagihan.index')->with('success', 'Tagihan berhasil diperbarui.');
    
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:PENDING,LUNAS',
        ]);

        $tagihan = Tagihan::findOrFail($id);
        $tagihan->status = $request->status;
        $tagihan->save();

        return response()->json(['message' => 'Status updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tagihan = Tagihan::findOrFail($id);
        $tagihan->delete();
        
        return response()->json(['success' => 'Tagihan berhasil dihapus']);
    }

    public function pembayaran(string $id)
    {
        $data['pelanggans'] = Pelanggan::all();
        $data['abonemens'] = Abonemen::all();
        $data['pemakaians'] = Pemakaian::all();
        $data['tagihan'] = Tagihan::findOrFail($id);
        
        return view('tagihan.pembayaran', $data);
    }

    public function export_excel(){
        $now = date("Y-m-d H:i:s");
        return Excel::download(new TagihanExport, 'Tagihan '. $now .'.xlsx');
    }
}
