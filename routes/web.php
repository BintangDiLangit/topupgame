<?php

use App\Http\Controllers\ApiGamesCallbackController;
use App\Http\Controllers\CallbackController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\MainController;

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

Route::get('/games', [GameController::class, 'listGame']);
Route::get('/detail-game/{game_name}/{slug}', [GameController::class, 'detailGame'])->name('game.detail');
Route::post('/cek-user', [GameController::class, 'cekUserML'])->name('cek.user');

Route::get('/game/mobile-legends', [LayananController::class, 'listLayananML']);
Route::post('/place-order/{game_name}/{slug}', [OrderController::class, 'placeOrder'])->name('place.order');
Route::post('/cek-status-order', [OrderController::class, 'statusOrder']);


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/products', [ProdukController::class, 'index'])->name('produk.index');
    Route::post('/product', [ProdukController::class, 'store'])->name('produk.store');
    Route::put('/product/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/product/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
    Route::get('/deposit', [DepositController::class, 'depositView'])->name('deposit.index');
});
Route::get('/admin/profile', [ProfileController::class, 'profile']);
Route::get('/admin/deposit', [DepositController::class, 'depositView']);
Route::post('/admin/deposit', [DepositController::class, 'depositSaldo']);


Route::post('/apigames/transaksi/callback', [ApiGamesCallbackController::class, 'transaksi']);
Route::post('/in-callback', [CallbackController::class, 'inCallback']);
Route::post('/out-callback', [CallbackController::class, 'outCallback']);


Route::get('/payment-success/{id}/{game}', function () {
    return view('payment-success');
})->name('payment.success');

Route::get('/tes', function () {
    return view('payment-success');
});