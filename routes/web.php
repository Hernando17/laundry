<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KasirController;

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

Route::view('/', 'index')->name('index');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('loginact');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('store');
Route::get('/admin/outlet', [AdminController::class, 'outlet'])->name('outletadmin');
Route::get('/admin/deleteoutlet/{id}', [AdminController::class, 'deleteoutlet'])->name('deleteoutlet');
Route::get('/admin/inputoutlet', [AdminController::class, 'inputoutlet'])->name('inputoutlet');
Route::post('/admin/addoutlet', [AdminController::class, 'addoutlet'])->name('addoutlet');
Route::get('/admin/editoutlet/{id}', [AdminController::class, 'editoutlet'])->name('editoutlet');
Route::post('/admin/editoutletact/{id}', [AdminController::class, 'editoutletact'])->name('editoutletact');
Route::get('/kasir/kasir', [KasirController::class, 'index'])->name('indexkasir');
