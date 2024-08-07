<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@dashboard');

Route::get('/pelanggan/export-excel', 'App\Http\Controllers\PelangganController@export_excel')->name('pelanggan.export_excel');
Route::resource('/pelanggan', 'App\Http\Controllers\PelangganController');
Route::get('/asset/export-excel', 'App\Http\Controllers\AssetController@export_excel')->name('asset.export_excel');
Route::resource('/asset', 'App\Http\Controllers\AssetController');
Route::get('/abonemen/export-excel', 'App\Http\Controllers\AbonemenController@export_excel')->name('abonemen.export_excel');
Route::resource('/abonemen', 'App\Http\Controllers\AbonemenController');
Route::get('/wallet/export-excel', 'App\Http\Controllers\WalletController@export_excel')->name('wallet.export_excel');
Route::resource('/wallet', 'App\Http\Controllers\WalletController');
Route::get('/pemakaian/export-excel', 'App\Http\Controllers\PemakaianController@export_excel')->name('pemakaian.export_excel');
Route::resource('/pemakaian', 'App\Http\Controllers\PemakaianController');
Route::post('/get-meter-awal', [App\Http\Controllers\PemakaianController::class, 'getMeterAwal'])->name('getMeterAwal');

Route::resource('/tagihan', 'App\Http\Controllers\TagihanController');
Route::get('/getAbonemenDetails/{id}', [App\Http\Controllers\TagihanController::class, 'getAbonemenDetails']);

Route::get('/getPemakaianByPelanggan/{pelanggan_id}', function($pelanggan_id) {
    $pemakaian = \App\Models\Pemakaian::where('pelanggan_id', $pelanggan_id)->pluck('bulan', 'id');
    return response()->json($pemakaian);
});
Route::get('/getJumlahPakai/{pemakaian_id}', function($pemakaian_id) {
    $pemakaian = \App\Models\Pemakaian::find($pemakaian_id);
    return response()->json(['jumlah_pakai' => $pemakaian->pakai]);
});
Route::get('/getAbonemenDetails/{abonemen_id}', function($abonemen_id) {
    $abonemen = \App\Models\Abonemen::find($abonemen_id);
    return response()->json([
        'harga' => $abonemen->harga,
        'administrasi' => $abonemen->administrasi,
        'keterlambatan' => $abonemen->keterlambatan
    ]);
});

// Route::post('/tagihan/update-status/{id}', 'App\Http\Controllers\TagihanController@updateStatus')->name('tagihan.updateStatus');
// Route::put('/tagihan/{id}', [App\Http\Controllers\TagihanController::class, 'updateStatus'])->name('tagihan.updateStatus');
Route::put('/tagihan/{id}', [App\Http\Controllers\TagihanController::class, 'updateStatus']);

Route::resource('/kas', 'App\Http\Controllers\KasController');

