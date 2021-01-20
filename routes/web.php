<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@ShowHome' )->name('home');
Route::get('/term-of-reference', 'HomeController@ShowTermOfReference' )->name('term');

Route::get('/tps', function(){
    return view('Pengerjaan.tps');
});

Route::get('/tpa', function(){
    return view('Pengerjaan.tpa');
});

Route::get('/pengerjaan', function(){
    return view('Pengerjaan.pengerjaan');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['admin'])->prefix('admin')->name('admin')->group(function () {
    Route::get('/dashboard', 'AdminController@AdminDashboard')->name('.dashboard');
    // Sesi
    Route::name('.sesi')->prefix('sesi')->group(function(){
        Route::get('/', 'SesiController@ListSesi')->name('.list');
        Route::get('/buat', 'SesiController@BuatSesiPage')->name('.buat');
        Route::post('/buat', 'SesiController@BuatSesi');
        Route::get('/edit/{sesi}', 'SesiController@editSesiPage')->name('.edit');
        Route::post('/edit/{sesi}', 'SesiController@updateSesi');
        Route::get('/hapus/{sesi}', 'SesiController@HapusSesi')->name('.hapus');
    });
    
    // Paket
    Route::name('.paket')->prefix('paket')->group(function () {
        Route::get('/', 'PaketController@ShowListPaket')->name('.list');
        Route::get('/buat', 'PaketController@ShowListPaket')->name('.buat');
    });
    
    
    Route::get('/users', 'AdminController@AdminDashboard')->name('.users');
    Route::get('/jenis', 'AdminController@AdminDashboard')->name('.listJenis');
    Route::get('/Soal', 'AdminController@AdminDashboard')->name('.listSoal');

});

require __DIR__.'/auth.php';
