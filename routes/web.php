<?php

use App\Http\Controllers\ApiGamesCallbackController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CallbackController;
use App\Http\Controllers\Clients\CekUserController;
use App\Http\Controllers\Clients\DetailClientController;
use App\Http\Controllers\Clients\ProdukClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MasterKategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Clients\MainController;

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

Route::get('/', [MainController::class, 'index']);
Route::get('/about-us', [MainController::class, 'about']);
Route::get('/contact', [MainController::class, 'contact']);
// Contact
Route::post('send-message', [MainController::class, 'sendMessage'])->name('send.message');

// Main Page
Route::get('/{kategori}', [DetailClientController::class, 'kategori']);
Route::get('/detail-game/{game_name}/{slug}', [DetailClientController::class, 'detailGame'])->name('game.detail');
Route::get('/{kategori}/{produk}', [ProdukClientController::class, 'index'])->name('client.produk.index');

// Cek User
Route::post('/cek-user', [CekUserController::class, 'cekUserML'])->name('cek.user');

// Transaksi Page
Route::post('/place-order/{game_name}/{slug}', [OrderController::class, 'placeOrder'])->name('place.order');
Route::post('/cek-status-order', [OrderController::class, 'statusOrder']);
Route::post('/apigames/transaksi/callback', [ApiGamesCallbackController::class, 'transaksi']);
Route::post('/in-callback', [CallbackController::class, 'inCallback']);
Route::post('/out-callback', [CallbackController::class, 'outCallback']);

Route::get('/error/page/503', function (){
    return view('errors.503');
})->name('error.503');

Route::get('/tos/page/bimy', function (){
    return view('others.tos');
})->name('tos');

// Admin Page
Route::get('/login', [AuthController::class, 'loginView'])->name('login');
Route::post('/login', [AuthController::class, 'loginOl'])->name('loginol');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/vendor', [VendorController::class, 'index'])->name('vendor.index');
    Route::post('/vendor', [VendorController::class, 'store'])->name('vendor.store');
    Route::put('/vendor/{id}', [VendorController::class, 'update'])->name('vendor.update');
    Route::delete('/vendor/{id}', [VendorController::class, 'destroy'])->name('vendor.destroy');

    Route::get('/master-kategori', [MasterKategoriController::class, 'index'])->name('master.kategori.index');
    Route::post('/master-kategori', [MasterKategoriController::class, 'store'])->name('master.kategori.store');
    Route::put('/master-kategori/{id}', [MasterKategoriController::class, 'update'])->name('master.kategori.update');
    Route::delete('/master-kategori/{id}', [MasterKategoriController::class, 'destroy'])->name('master.kategori.destroy');

    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

    Route::get('/products', [ProdukController::class, 'index'])->name('produk.index');
    Route::post('/product', [ProdukController::class, 'store'])->name('produk.store');
    Route::put('/product/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/product/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

    Route::get('/deposit', [DepositController::class, 'depositView'])->name('deposit.index');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'profile']);
    Route::get('/deposit', [DepositController::class, 'depositView']);
    Route::post('/deposit', [DepositController::class, 'depositSaldo']);
});
