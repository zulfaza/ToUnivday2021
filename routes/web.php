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
        Route::get('/buat', 'PaketController@BuatPaketPage')->name('.buat');
        Route::post('/buat', 'PaketController@BuatPaket');

        Route::get('/edit/{paket}', 'PaketController@EditPaketPage')->name('.edit');
        Route::post('/edit/{paket}', 'PaketController@editPaket');

        Route::get('/hapus/{paket}', 'PaketController@HapusPaket')->name('.hapus');
    });
    
    // Jenis
    Route::name('.jenis')->prefix('jenis')->group(function(){
        Route::get('/', 'JenisController@list')->name('.list');
        Route::get('/buat', 'JenisController@ShowJenisPage')->name('.buat');
        Route::post('/buat', 'JenisController@BuatJenis');
        Route::get('/edit/{jenis}', 'JenisController@ShowJenisEditPage')->name('.edit');
        Route::post('/edit/{jenis}', 'JenisController@UpdateJenis');
        Route::get('/hapus/{jenis}', 'JenisController@HapusJenis')->name('.hapus');
    });
    Route::get('/users', 'AdminController@AdminDashboard')->name('.users');

});

require __DIR__.'/auth.php';
