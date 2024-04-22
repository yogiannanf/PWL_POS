<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\M_userControllers;
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

// Route::get('/level', [LevelController::class, 'index']);

// Route::get('/kategori', [KategoriController::class, 'index']);

// Route::get('/user', [ControllersUserController::class, 'index']);

// Route::get('/user/tambah', [ControllersUserController::class, 'tambah']);

// Route::put('/user/tambah_simpan', [ControllersUserController::class, 'tambah_simpan']);

// Route::get('/user/ubah/{id}', [ControllersUserController::class, 'ubah']);

// Route::put('/user/ubah_simpan/{id}', [ControllersUserController::class, 'ubah_simpan']);

// Route::get('/user/hapus/{id}', [ControllersUserController::class, 'hapus']);

// Route::get('/kategori/create', [KategoriController::class, 'create']);

// Route::post('/kategori', [KategoriController::class, 'store']);

//js 5 no 3
Route::get('/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
//--
//JS 5 no 4
Route::get('/delete/{id}', [KategoriController::class, 'destroy'])->name('kategori.delete');

// JS 6
Route::get('/m_user', [M_userControllers::class, 'index']);
Route::get('/m_user/create', [M_userControllers::class, 'create'])->name('user.create');
Route::post('/m_user/create', [M_userControllers::class, 'getLevel'])->name('user.create');
Route::post('/m_user', [M_userControllers::class, 'store']);
Route::get('/m_user/edit/{id}', [M_userControllers::class, 'edit'])->name('user.edit');
Route::put('/m_user/update/{id}', [M_userControllers::class, 'update'])->name('user.update');
Route::get('/m_user/delete/{id}', [M_userControllers::class, 'delete'])->name('user.delete');

Route::get('/level/create', [LevelController::class, 'create'])->name('level.create');
Route::post('/level/create', [LevelController::class, 'getLevel'])->name('level.create');