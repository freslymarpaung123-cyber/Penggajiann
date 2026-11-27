<?php

use Illuminate\Support\Facades\Route;

// Controller
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PenggajianController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\LaporanController;


/*
|--------------------------------------------------------------------------
| Halaman Awal
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/tes', function () {
    return 'Laravel berhasil membaca route!';
});



/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');



/*
|--------------------------------------------------------------------------
| Semua User Login
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {


    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');


    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');


    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');



    /*
    |--------------------------------------------------------------------------
    | MASTER DATA
    |--------------------------------------------------------------------------
    */


    // Data Jabatan
    Route::resource('jabatans', JabatanController::class);



    // Data Karyawan
    Route::resource('karyawans', KaryawanController::class);




    /*
    |--------------------------------------------------------------------------
    | ABSENSI
    |--------------------------------------------------------------------------
    */


    Route::get(
        '/absensis/cetak',
        [AbsensiController::class, 'cetak']
    )->name('absensis.cetak');


    Route::resource(
        'absensis',
        AbsensiController::class
    );





    /*
    |--------------------------------------------------------------------------
    | PENGGAJIAN
    |--------------------------------------------------------------------------
    */


    Route::resource(
        'penggajians',
        PenggajianController::class
    );



    /*
    |--------------------------------------------------------------------------
    | SLIP GAJI
    |--------------------------------------------------------------------------
    */


    Route::get(
        '/penggajians/{penggajian}/slip',
        [PenggajianController::class, 'slip']
    )->name('penggajians.slip');



    Route::get(
        '/penggajians/{penggajian}/pdf',
        [PenggajianController::class, 'pdf']
    )->name('penggajians.pdf');






    /*
    |--------------------------------------------------------------------------
    | LAPORAN
    |--------------------------------------------------------------------------
    */


    Route::get(
        '/laporan-absensi',
        [LaporanController::class, 'absensi']
    )->name('laporan.absensi');

    Route::get(
        '/laporan-absensi/pdf',
        [LaporanController::class, 'absensiPdf']
    )->name('laporan.absensi.pdf');


    Route::get(
        '/laporan-penggajian',
        [LaporanController::class, 'penggajian']
    )->name('laporan.penggajian');

    Route::get(
        '/laporan-penggajian/pdf',
        [LaporanController::class, 'penggajianPdf']
    )->name('laporan.penggajian.pdf');


});



/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';