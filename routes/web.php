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
Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/pelanggan/export-excel', 'App\Http\Controllers\PelangganController@export_excel')->name('pelanggan.export_excel');
Route::resource('/pelanggan', 'App\Http\Controllers\PelangganController');
Route::get('/asset/export-excel', 'App\Http\Controllers\AssetController@export_excel')->name('asset.export_excel');
Route::resource('/asset', 'App\Http\Controllers\AssetController');
Route::get('/abonemen/export-excel', 'App\Http\Controllers\AbonemenController@export_excel')->name('abonemen.export_excel');
Route::resource('/abonemen', 'App\Http\Controllers\AbonemenController');
Route::get('/bank/export-excel', 'App\Http\Controllers\BankController@export_excel')->name('bank.export_excel');
Route::resource('/bank', 'App\Http\Controllers\BankController');
Route::resource('/pemakaian', 'App\Http\Controllers\PemakaianController');

Route::get('/getLastMeterAkhir/{pelanggan_id}', 'App\Http\Controllers\PemakaianController@getLastMeterAkhir')->name('getLastMeterAkhir');
