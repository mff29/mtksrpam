<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemakaian;
use App\Models\Pelanggan;
use Yajra\DataTables\Facades\DataTables;
use App\Exports\PemakaianExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use App\Models\Tagihan;
use App\Models\Abonemen;
use Illuminate\Support\Str;

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

    public function getMeterAwal(Request $request)
    {
        $pelanggan_id = $request->pelanggan_id;
        $bulan = $request->bulan;
        
        // Menghitung bulan sebelumnya
        $previousMonth = Carbon::createFromFormat('Y-m', $bulan)->subMonth()->format('Y-m');

        // Mencari nilai meter_akhir dari bulan sebelumnya
        $latest = Pemakaian::where('pelanggan_id', $pelanggan_id)
                            ->where('bulan', $previousMonth)
                            ->first();

        return response()->json(['meter_awal' => $latest ? $latest->meter_akhir : 0]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['pelanggan'] = Pelanggan::all()->mapWithKeys(function ($item) {
            return [$item['id'] => $item['kode'] . ' - ' . $item['nama']];
        });

        $data['abonemens'] = Abonemen::all();
        return view('pemakaian.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required',
            'bulan' => 'required|date_format:Y-m',
            'meter_akhir' => 'required|gte:meter_awal',
            'pakai' => 'required',
        ]);

        $jumlah_pakai = $request->meter_akhir - $request->meter_awal;

        $exists = Pemakaian::where('pelanggan_id', $request->pelanggan_id)
                            ->where('bulan', $request->bulan)
                            ->exists();
        if ($exists) {
            return redirect()->back()->withErrors(['error' => 'Data Pemakaian untuk Pelanggan dan Bulan tersebut sudah terinput!'])->withInput();
        }

        $pemakaian = Pemakaian::create([
            // 'id' => Str::uuid(),
            'pelanggan_id' => $request->pelanggan_id,
            'bulan' => $request->bulan,
            'meter_awal' => $request->meter_awal,
            'meter_akhir' => $request->meter_akhir,
            'pakai' => $jumlah_pakai,
            'abonemen_id' => $request->abonemen_id,
        ]);
        // $data = Pemakaian::create($request->all());
        // $pemakaian->save();

        $abonemen = Abonemen::find($request->abonemen_id);

        $harga_per_meter = $abonemen->harga;
        $administrasi = $abonemen->administrasi;
        $denda_keterlambatan = $abonemen->denda_keterlambatan;
        $denda_keterlambatan = ($request->telat === 'YA') ? $abonemen->denda_keterlambatan : 0;
        $tagihan_total = ($harga_per_meter * $jumlah_pakai) + $administrasi + $denda_keterlambatan;

        // Buat tagihan baru
        Tagihan::create([
            'id' => Str::uuid(),
            'pelanggan_id' => $pemakaian->pelanggan_id,
            'pemakaian_id' => $pemakaian->id,
            'abonemen_id' => $abonemen->id,
            'harga_per_meter' => $harga_per_meter,
            'jumlah_pakai' => $jumlah_pakai,
            'administrasi' => $administrasi,
            'telat' => 'Tidak',
            'denda_keterlambatan' => $denda_keterlambatan,
            'tagihan' => $tagihan_total,
            'jenis_bayar' => 'Default',
            'status' => 'PENDING',
        ]);

        return redirect(route('pemakaian.index'))->with('message','Data berhasil disimpan!');
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
        $data['abonemens'] = Abonemen::all();

        return view('pemakaian.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'pelanggan_id' => 'required',
            'bulan' => 'required|date_format:Y-m',
            'meter_awal' => 'required|numeric',
            'meter_akhir' => 'required|numeric|gte:meter_awal',
            'pakai' => 'nullable|numeric',
            'abonemen_id' => 'required'
        ]);

        $pemakaian = Pemakaian::findOrFail($id);

        if (Pemakaian::where('pelanggan_id', $request->pelanggan_id)
            ->where('bulan', $request->bulan)
            ->where('id', '!=', $id)
            ->exists()) {
            return redirect()->back()->withErrors(['error' => 'Data untuk Pelanggan dan Bulan tersebut sudah ada!'])->withInput();
        }

        $previousMonth = Carbon::createFromFormat('Y-m', $request->bulan)->subMonth()->format('Y-m');
        $meterAwal = Pemakaian::where('pelanggan_id', $request->pelanggan_id)
            ->where('bulan', $previousMonth)
            ->orderBy('created_at', 'desc')
            ->value('meter_akhir');

        if ($request->input('meter_akhir') < $meterAwal) {
            return redirect()->back()->withErrors(['meter_akhir' => 'Tidak boleh lebih kecil dari Meter Awal.'])->withInput();
        }

        $jumlah_pakai = $request->meter_akhir - $request->meter_awal;

        $pemakaian->update([
            'pelanggan_id' => $request->pelanggan_id,
            'bulan' => $request->bulan,
            'meter_awal' => $request->meter_awal,
            'meter_akhir' => $request->meter_akhir,
            'pakai' => $jumlah_pakai,
            'abonemen_id' => $request->abonemen_id,
        ]);

        $abonemen = Abonemen::find($request->abonemen_id);

        $harga_per_meter = $abonemen->harga;
        $administrasi = $abonemen->administrasi;
        $denda_keterlambatan = ($request->telat === 'YA') ? $abonemen->denda_keterlambatan : 0;
        $tagihan_total = ($harga_per_meter * $jumlah_pakai) + $administrasi + $denda_keterlambatan;

        // Update tagihan yang terkait
        $tagihan = Tagihan::where('pemakaian_id', $id)->first();
        $tagihan->update([
            'pelanggan_id' => $pemakaian->pelanggan_id,
            'abonemen_id' => $abonemen->id,
            'harga_per_meter' => $harga_per_meter,
            'jumlah_pakai' => $jumlah_pakai,
            'administrasi' => $administrasi,
            'denda_keterlambatan' => $denda_keterlambatan,
            'tagihan' => $tagihan_total,
        ]);

        return redirect(route('pemakaian.index'))->with('message', 'Data berhasil disimpan');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pemakaian = Pemakaian::findOrFail($id);
        Tagihan::where('pemakaian_id', $id)->delete(); // Hapus tagihan yang terkait
        $pemakaian->delete();

        return response()->json(['success' => 'Data berhasil dihapus']);
    }

    public function export_excel(){
        $now = date("Y-m-d H:i:s");
        return Excel::download(new PemakaianExport, 'Pemakaian '. $now .'.xlsx');
    }
}
