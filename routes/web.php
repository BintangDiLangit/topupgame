<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\GetNickNameController;

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
    return view('main');
});

Route::get('/detail', function () {
    return view('detail-topup');
});

Route::get('services', [LayananController::class,'listLayanan']);
Route::post('place-order', [OrderController::class,'placeOrder']);
Route::post('cek-status-order', [OrderController::class,'statusOrder']);
Route::post('get-nickname-ml', [GetNickNameController::class,'getNickNameMobileLegend']);

Route::get('admin/profile', [ProfileController::class,'profile']);
