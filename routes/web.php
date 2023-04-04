<?php

use App\Http\Controllers\Admin\Users\RoleController;
use App\Http\Controllers\Admin\Users\UserController;
use App\Http\Controllers\AI\BlogController as OpenAIBlog;
use App\Http\Controllers\ApiGamesCallbackController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Blog\KategoriBlogController;
use App\Http\Controllers\Blog\KomentarController;
use App\Http\Controllers\CallbackController;
use App\Http\Controllers\Clients\CekUserController;
use App\Http\Controllers\Clients\DetailClientController;
use App\Http\Controllers\Clients\ProdukClientController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MasterKategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Clients\MainController;
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

Route::get('/', [MainController::class, 'index']);
Route::get('/about-us', [MainController::class, 'about']);
Route::get('/contact', [MainController::class, 'contact']);
// Contact
Route::post('send-message', [MainController::class, 'sendMessage'])->name('send.message');

// Main Page
Route::get('client/{kategori}', [DetailClientController::class, 'kategori']);
Route::get('client/detail-game/{game_name}/{slug}', [DetailClientController::class, 'detailGame'])->name('game.detail');
Route::get('client/{kategori}/{produk}', [ProdukClientController::class, 'index'])->name('client.produk.index');

// Cek User
Route::post('/cek-user', [CekUserController::class, 'cekUserML'])->name('cek.user');

// Transaksi Page
Route::post('/place-order/{game_name}/{slug}', [OrderController::class, 'placeOrder'])->name('place.order');

// Route::post('/cek-status-order', [OrderController::class, 'statusOrder']);
Route::post('/apigames/transaksi/callback', [ApiGamesCallbackController::class, 'transaksi']);
Route::post('/in-callback', [CallbackController::class, 'inCallback']);
Route::post('/out-callback', [CallbackController::class, 'outCallback']);

Route::get('/checkout/success', function () {
    return view('payment-success');
});

Route::get('/checkout/failed', function () {
    return view('payment-failed');
});



Route::get('/error/page/503', function () {
    return view('errors.503');
})->name('error.503');

Route::get('/tos/page/bimy', function () {
    return view('others.tos');
})->name('tos');

// Admin Page
Route::get('admin/login', [AuthController::class, 'loginView'])->name('login');
Route::post('admin/login', [AuthController::class, 'loginOl'])->name('loginol');

Route::get('/try', [Controller::class, 'try']);

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('role:1,2,3');

    Route::get('/vendor', [VendorController::class, 'index'])->name('vendor.index')->middleware('role:1,2,3');
    Route::post('/vendor', [VendorController::class, 'store'])->name('vendor.store')->middleware('role:1,2,3');
    Route::put('/vendor/{id}', [VendorController::class, 'update'])->name('vendor.update')->middleware('role:1,2,3');
    Route::delete('/vendor/{id}', [VendorController::class, 'destroy'])->name('vendor.destroy')->middleware('role:1,2,3');

    Route::get('/master-kategori', [MasterKategoriController::class, 'index'])->name('master.kategori.index')->middleware('role:1,2');
    Route::post('/master-kategori', [MasterKategoriController::class, 'store'])->name('master.kategori.store')->middleware('role:1,2');
    Route::put('/master-kategori/{id}', [MasterKategoriController::class, 'update'])->name('master.kategori.update')->middleware('role:1,2');
    Route::delete('/master-kategori/{id}', [MasterKategoriController::class, 'destroy'])->name('master.kategori.destroy')->middleware('role:1,2');

    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index')->middleware('role:1,2');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store')->middleware('role:1,2');
    Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update')->middleware('role:1,2');
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy')->middleware('role:1,2');

    Route::get('/products', [ProdukController::class, 'index'])->name('produk.index')->middleware('role:1,2,3');
    Route::post('/product', [ProdukController::class, 'store'])->name('produk.store')->middleware('role:1,2,3');
    Route::put('/product/{id}', [ProdukController::class, 'update'])->name('produk.update')->middleware('role:1,2,3');
    Route::delete('/product/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy')->middleware('role:1,2,3');

    Route::get('/deposit', [DepositController::class, 'depositView'])->name('deposit.index')->middleware('role:1,2,3');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('role:1,2,3');
    Route::get('/profile', [ProfileController::class, 'profile'])->middleware('role:1,2,3');
    // Route::get('/deposit', [DepositController::class, 'depositView'])->middleware('role:1,2');
    Route::post('/deposit', [DepositController::class, 'depositSaldo'])->middleware('role:1,2,3');

    Route::get('/transaksi', [TransaksiController::class, 'transaksi'])->name('transaksi.index')->middleware('role:1,2,3');
    Route::get('/riwayat-transaksi', [TransaksiController::class, 'riwayatTransaksis'])->name('riwayat.transaksi.index')->middleware('role:1,2,3');


    Route::resource('kategori-blog', KategoriBlogController::class)->middleware('role:1,2,3');
    Route::resource('blog', BlogController::class)->middleware('role:1,2,3');
    Route::resource('komentar', KomentarController::class)->middleware('role:1,2,3');

    // users
    Route::resource('users', UserController::class)->middleware('role:1');
    // roles
    Route::resource('roles', RoleController::class)->middleware('role:1');

    // OPENAI
    Route::get('/generate-blog', [OpenAIBlog::class, 'generateText'])->middleware('role:1,2,3');
});
