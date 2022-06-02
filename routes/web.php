<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ValidasiController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\jadwalController;
use App\Http\Controllers\RekaptulasiController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\RevisiController;

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

Route::get('/', function () {
    return view('auth/login');
});
Route::get('dasboard', function () {
    return view('admin/dasboard');
});



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['role:koordinator|Admin']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('/rekap', RekapController::class);
    
});

Route::group(['middleware' => 'auth', 'prefix' => 'messages', 'as' => 'messages'], function () {
    Route::get('/', [MessagesController::class, 'index']);
    Route::get('create', [MessagesController::class, 'create'])->name('.create');
    Route::post('/', [MessagesController::class, 'store'])->name('.store');
    Route::get('{thread}', [MessagesController::class, 'show'])->name('.show');
    Route::put('{thread}', [MessagesController::class, 'update'])->name('.update');
    Route::delete('{thread}', [MessagesController::class, 'destroy'])->name('.destroy');
});
Route::group(['middleware' => ['role:penguji|pebimbing']], function () {
    Route::resource('/penilaian', PenilaianController::class);
    Route::resource('/validasi', ValidasiController::class);
    
    
});

Route::resource('/rekaptulasi', RekaptulasiController::class);
Route::resource('/revisi', RevisiController::class);
Route::resource('/jadwal', jadwalController::class);
Route::get('/exportpdf', [jadwalController::class, 'exportpdf'])->name('exportpdf');
