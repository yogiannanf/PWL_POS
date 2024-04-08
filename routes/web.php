<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController as ControllersUserController;
use Illuminate\Http\Controllers\UserController;
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

Route::get('/level', [LevelController::class, 'index']);

Route::get('/kategori', [KategoriController::class, 'index']);

Route::get('/user', [ControllersUserController::class, 'index']);

Route::get('/user/tambah', [ControllersUserController::class, 'tambah']);

Route::put('/user/tambah_simpan', [ControllersUserController::class, 'tambah_simpan']);

Route::get('/user/ubah/{id}', [ControllersUserController::class, 'ubah']);

Route::put('/user/ubah_simpan/{id}', [ControllersUserController::class, 'ubah_simpan']);

Route::get('/user/hapus/{id}', [ControllersUserController::class, 'hapus']);