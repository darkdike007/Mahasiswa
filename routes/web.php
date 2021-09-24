<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    mahasiswaController,
};

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

/**
 * Route untuk dashboard
 */
Route::get('/', function () {
    return view('Dashboard');
})->middleware(['auth'])->name('dashboard');

/**
 * Route untuk table mahasiswa
 */
Route::resource('mahasiswa', mahasiswaController::class)->middleware(['auth']);

require __DIR__.'/auth.php';
