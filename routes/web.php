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
// Admin Pengguna
Route::get('/admin/pengguna', [AdminController::class, 'pengguna'])->name('penggunaadmin');
Route::get('/admin/deletepengguna/{id}', [AdminController::class, 'deletepengguna'])->name('deletepenggunaadmin');
Route::get('/admin/editpengguna/{id}', [AdminController::class, 'editpengguna'])->name('editpenggunaadmin');
Route::post('/admin/editpenggunaact/{id}', [AdminController::class, 'editpenggunaact'])->name('editpenggunaadminact');
Route::get('/admin/gantipasswordpengguna/{id}', [AdminController::class, 'gantipasswordpengguna'])->name('gantipasswordpenggunaadmin');
// Admin Transaksi
Route::get('/admin/transaksi', [AdminController::class, 'transaksi'])->name('transaksiadmin');
Route::get('/admin/inputtransaksi', [AdminController::class, 'inputtransaksi'])->name('inputtransaksiadmin');
Route::post('/admin/addtransaksi', [AdminController::class, 'addtransaksi'])->name('addtransaksiadmin');
Route::get('/admin/deletetransaksi/{id}', [AdminController::class, 'deletetransaksi'])->name('deletetransaksiadmin');
Route::get('/admin/edittransaksi/{id}', [AdminController::class, 'edittransaksi'])->name('edittransaksiadmin');
Route::post('/admin/edittransaksiact/{id}', [AdminController::class, 'edittransaksiact'])->name('edittransaksiadminact');
// Admin Laporan
Route::get('/admin/laporan', [AdminController::class, 'laporan'])->name('laporanadmin');
Route::get('/admin/inputlaporan', [AdminController::class, 'inputlaporan'])->name('inputlaporanadmin');
Route::post('/admin/addlaporan', [AdminController::class, 'addlaporan'])->name('addlaporanadmin');
Route::get('/admin/deletelaporan/{id}', [AdminController::class, 'deletelaporan'])->name('deletelaporanadmin');
Route::get('/admin/editlaporan/{id}', [AdminController::class, 'editlaporan'])->name('editlaporanadmin');
Route::get('/admin/printlaporan/{id}', [AdminController::class, 'printlaporan'])->name('printlaporanadmin');



// Kasir
Route::get('/kasir/kasir', [KasirController::class, 'index'])->name('indexkasir');
