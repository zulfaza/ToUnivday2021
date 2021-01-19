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
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('.dashboard');
});

require __DIR__.'/auth.php';
