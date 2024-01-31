<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeasiswaController;

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

// Route::get('/beasiswa', function () {
//     return view('beasiswa.beasiswa');
// });

Route::get('/hasil', [BeasiswaController::class, 'hasil']);

Route::get('/beasiswa/create', [BeasiswaController::class, 'beasiswa']);

Route::post('/beasiswa/store', [BeasiswaController::class, 'store']);

Route::get('/beasiswa/{id}/edit', [BeasiswaController::class, 'edit']);

Route::put('/beasiswa/{index}', [BeasiswaController::class, 'update']);

Route::delete('/beasiswa/{index}', [BeasiswaController::class, 'destroy']);

Route::get('/beasiswa/chart', [BeasiswaController::class, 'chart']);

Route::get('/get-ipk-by-nama', [BeasiswaController::class, 'getIpkByNama']);
