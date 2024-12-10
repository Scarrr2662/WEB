<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\PinjamBarangController;

Route::get('/', function () {
   return view('home');
});
// Rute untuk menampilkan semua data suplier
Route::get('/suplier', [SuplierController::class, 'index'])->name('suplier.index');
// Rute untuk menampilkan form membuat suplier baru
Route::get('/suplier/create', [SuplierController::class, 'create'])->name('suplier.create');
// Rute untuk menambahkan data suplier baru
Route::post('/suplier', [SuplierController::class, 'store'])->name('supplier.store');
// Route untuk menampilkan form edit
Route::get('/suplier/{suplier}', [SuplierController::class, 'edit'])->name('suplier.edit');
// Route untuk mengupdate data supplier
Route::put('/suplier/{suplier}', [SuplierController::class, 'update'])->name('suplier.update');
// Route untuk menghapus data supplier
Route::delete('/suplier/{suplier}', [SuplierController::class, 'destroy'])->name('suplier.destroy');

Route::resource('users', UserController::class);
Route::get('user/edit', [UserController::class, 'edit'])->name('users.edit');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
// Rute untuk User
Route::get('/user', [UserController::class, 'index'])->name('users.index');
Route::get('/user/create', [UserController::class, 'create'])->name('users.create');
Route::post('/user', [UserController::class, 'store'])->name('users.store');
Route::get('/user/{user}', [UserController::class, 'edit'])->name('users.edit');
Route::put('/user/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::delete('/user/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');


Route::resource('stok', StokController::class);


Route::resource('barang_masuk', BarangMasukController::class);
Route::resource('barang_keluar', BarangKeluarController::class);
Route::resource('pinjam_barang', PinjamBarangController::class);
