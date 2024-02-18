<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KaryawanController;
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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard',[HomeController::class, 'home'])->name('dashboard');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/add-karyawan', [KaryawanController::class, 'redirectToAddKaryawanPage']);
    Route::post('/post-add-karyawan', [KaryawanController::class, 'addKaryawan']);
    Route::get('/delete-karyawan/{id}', [KaryawanController::class, 'deleteKaryawan']);
    Route::get('/update-karyawan-page/{id}', [KaryawanController::class, 'updateKaryawanPage']);
    Route::patch('/update-karyawan/{id1}', [KaryawanController::class, 'updateKaryawan']);
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [LoginController::class,'index'])->name('login');
    Route::post('/login', [LoginController::class,'login'])->name('login');
});

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    } 
    else {
        return redirect()->route('login');
    }
});