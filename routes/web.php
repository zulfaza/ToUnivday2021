<?php

use App\Models\Answer;
use App\Models\Jenis;
use App\Models\Sesi;
use App\Models\Soal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

Route::post('/fungsi/upload','HomeController@upload');

Route::get('/', 'HomeController@ShowHome' )
        ->middleware(['check.ujian'])
        ->name('home');

// user Route
Route::middleware(['auth'])->name('user')->group(function(){
    Route::get('/term-of-reference', 'HomeController@ShowTermOfReference' )
    ->middleware(['check.ujian'])
    ->name('.term');
    Route::name('.pengerjaan')->prefix('pengerjaan')->group(function(){
        Route::get('/prepare/', 'TryOutController@pilihSesi')->name('.persiapan');
        Route::get('/{no?}', 'TryOutController@Pengerjaan')->name('.doing');
        Route::post('/{no?}', 'TryOutController@SaveAnswer');
    });
    

    Route::get('/dashboard', 'HomeController@ShowDashboard')
        ->middleware(['check.ujian'])
        ->name('.dashboard');
});



// Admin Route
Route::middleware(['admin'])->prefix('admin')->name('admin')->group(function () {
    Route::get('/dashboard', 'AdminController@AdminDashboard')->name('.dashboard');
    Route::post('/update/open-regis-admin', 'AdminController@updateOpenRegisAdmin')->name('.updetOpenRegis');
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
    
        Route::name('.soal')->prefix('soal')->group(function(){
            Route::get('/{paket}', 'PaketController@ShowSoalPage')->name('.tambah');
            Route::post('/{paket}', 'PaketController@SaveSoal');
            Route::get('/edit/{soal}', 'PaketController@editSoalPage')->name('.edit');
            Route::post('/edit/{soal}', 'PaketController@updateSoal');
            Route::get('/hapus/{soal}', 'PaketController@HapusSoal')->name('.hapus');
        });
    
    });
    
    // Jenis
    Route::name('.jenis')->prefix('jenis')->group(function(){
        Route::get('/{tipe?}', 'JenisController@list')->name('.list');
        Route::post('/buat', 'JenisController@BuatJenis')->name('.buat');
        Route::get('/edit/{jenis}', 'JenisController@ShowJenisEditPage')->name('.edit');
        Route::post('/edit/{jenis}', 'JenisController@UpdateJenis');
        Route::get('/hapus/{jenis}', 'JenisController@HapusJenis')->name('.hapus');
    });
    Route::name('.users')->prefix('users')->group(function(){
        Route::get('/', 'AdminController@listUserPage')->name('.list');
        Route::get('/detail/{user}', 'AdminController@detailUser')->name('.detail');
        Route::post('/update/open-regis', 'AdminController@updateOpenRegis')->name('.updateOpenRegis');
    });

});

require __DIR__.'/auth.php';
