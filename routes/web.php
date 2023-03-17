<?php

use App\Http\Controllers\CallbackController;
use App\Http\Controllers\GameController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\GetNickNameController;
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
Route::post('/cek-user', [GameController::class, 'cekUser'])->name('cek.user');

Route::get('/game/mobile-legends', [LayananController::class, 'listLayananML']);
Route::post('/place-order/{game_name}/{slug}', [OrderController::class, 'placeOrder'])->name('place.order');
Route::post('/cek-status-order', [OrderController::class, 'statusOrder']);

Route::get('/admin/profile', [ProfileController::class, 'profile']);


Route::post('/in-callback', [CallbackController::class, 'inCallback']);


Route::get('/payment-success/{id}/{game}', function () {
    return view('payment-success');
})->name('payment.success');

Route::get('/tes', function () {
    return view('payment-success');
});