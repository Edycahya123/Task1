<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesanController;

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

//admin
Route::get('/Admins', [ProdukController::class, 'Master']);
Route::get('Barang', [ProdukController::class, 'index']);
Route::get('Barang/Tambah', [ProdukController::class, 'Tambah']);
Route::post('Barang/Input', [ProdukController::class, 'Input']);
Route::get('Barang/Edit/{id}', [ProdukController::class, 'Edit']);
Route::post('Barang/Update/{id}', [ProdukController::class, 'Update']);
Route::get('Barang/Hapus/{id}', [ProdukController::class, 'Hapus']);

//user
Route::get('/', [ProdukController::class, 'home']);
Route::get('Home', [ProdukController::class, 'home']);
Route::get('About',[PesanController::class, 'about']);
//Route::get('Home/Pesan/{id}', [PesanController::class, 'index']);
Route::post('Home/Pesan', [PesanController::class, 'pesan']);
Route::get('/logout', [PesanController::class, 'logout']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
