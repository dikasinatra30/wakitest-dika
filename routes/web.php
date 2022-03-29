<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoalController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('soal-1', [SoalController::class, 'soal1'])->name('soal1');
Route::get('soal-2', [SoalController::class, 'soal2'])->name('soal2');
Route::get('soal-3', [SoalController::class, 'soal3'])->name('soal3');
Route::get('soal-4', [SoalController::class, 'soal4'])->name('soal4');
Route::post('postsoal-4', [SoalController::class, 'post_soal4'])->name('soal4.post');
Route::post('updatesoal-4/{id}', [SoalController::class, 'update_soal4'])->name('soal4.update');
Route::delete('destroysoal-4/{id}', [SoalController::class, 'destroy_soal4'])->name('soal4.destroy');

