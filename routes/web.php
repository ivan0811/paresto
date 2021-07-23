<?php

use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

//Pegawai
Route::get('api/pegawai', [App\Http\Controllers\PegawaiController::class, 'index'])->name('pegawai');
Route::post('api/pegawai', [App\Http\Controllers\PegawaiController::class, 'create'])->name('pegawai');
Route::get('api/pegawai/{pegawai}', [App\Http\Controllers\PegawaiController::class, 'show'])->name('pegawai');

//Menu
Route::get('api/menu', [App\Http\Controllers\MenuController::class, 'index'])->name('menu');
Route::post('api/menu/{menu}', [App\Http\Controllers\MenuController::class, 'show'])->name('menu');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/check-users', [UserController::class, 'CheckRoles'])->name('check_roles');

Route::get('/{any}', function(){
    return view('index');
})->where('any', '.*');

Route::get('/login', function(){
    return view('index');
});