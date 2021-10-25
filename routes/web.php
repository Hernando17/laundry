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

// Guest
Route::view('/', 'index')->name('index');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('loginact');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('store');
// Logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// Admin Outlet
Route::get('/admin/outlet', [AdminController::class, 'outlet'])->name('outletadmin');
Route::get('/admin/deleteoutlet/{id}', [AdminController::class, 'deleteoutlet'])->name('deleteoutletadmin');
Route::get('/admin/inputoutlet', [AdminController::class, 'inputoutlet'])->name('inputoutletadmin');
Route::post('/admin/addoutlet', [AdminController::class, 'addoutlet'])->name('addoutletadmin');
Route::get('/admin/editoutlet/{id}', [AdminController::class, 'editoutlet'])->name('editoutletadmin');
Route::post('/admin/editoutletact/{id}', [AdminController::class, 'editoutletact'])->name('editoutletactadmin');
// Admin Produk
Route::get('/admin/produk', [AdminController::class, 'produk'])->name('produkadmin');
Route::get('/admin/inputproduk', [AdminController::class, 'inputproduk'])->name('inputprodukadmin');
Route::post('/admin/addproduk', [AdminController::class, 'addproduk'])->name('addprodukadmin');
Route::get('/admin/editproduk/{id}', [AdminController::class, 'editproduk'])->name('editprodukadmin');
Route::post('/admin/editprodukact/{id}', [AdminController::class, 'editprodukact'])->name('editprodukadminact');
Route::get('/admin/deleteproduk/{id}', [AdminController::class, 'deleteproduk'])->name('deleteprodukadmin');

// Kasir
Route::get('/kasir/kasir', [KasirController::class, 'index'])->name('indexkasir');
