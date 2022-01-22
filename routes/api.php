<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\TransaksiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['middleware' => 'auth:sanctum'], function (){
    Route::get('/check-roles', [AuthController::class, 'CheckRoles']);
    Route::get('/check-status', [AuthController::class, 'checkStatus']);
    Route::get('/profile', [AuthController::class, 'showProfile']);
    Route::patch('/profile', [AuthController::class, 'updateProfile']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/pesanan', [PesananController::class, 'show']);
    Route::patch('/pesanan/update-status/{id}', [PesananController::class, 'updateStatus']);
    Route::post('/pesanan/update-status/menu', [PesananController::class, 'updateStatusPesananMenu']);    

    Route::get('/menu', [MenuController::class, 'index']);
    Route::get('/kategori', [MenuController::class, 'kategori']);
    Route::post('/menu/update-status', [MenuController::class, 'updateStatus']);
    
    Route::get('/transaksi', [TransaksiController::class, 'show']);

    Route::group(['middleware' => 'Admin'], function(){                                
        Route::prefix('pegawai')->group(function () {
            Route::get('/', [PegawaiController::class, 'index']);
            Route::post('/', [PegawaiController::class, 'store']);
            Route::get('/{id}', [PegawaiController::class, 'edit']);
            Route::patch('/{id}', [PegawaiController::class, 'update']);
            Route::delete('/{id}', [PegawaiController::class, 'destroy']);            
        });                
        Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy']); 
    });    

    Route::group(['middleware' => 'Pelayan'], function(){
        Route::prefix('meja')->group(function () {
            Route::get('/', [PesananController::class, 'meja']);
            Route::patch('/{no_meja}', [PesananController::class, 'updateMeja']); 
        });               
        Route::prefix('pesanan')->group(function () {            
            Route::post('/', [PesananController::class, 'store']);
            Route::get('/{id}', [PesananController::class, 'edit']);
            Route::patch('/{id}', [PesananController::class, 'update']);
            Route::delete('/{id}', [PesananController::class, 'destroy']);
        });
    });    

    Route::group(['middleware' => 'Koki'], function(){
        Route::prefix('menu')->group(function () {                        
            Route::post('/', [MenuController::class, 'store']);
            Route::get('/{id}', [MenuController::class, 'edit']);
            Route::patch('/{id}', [MenuController::class, 'update']);
            Route::delete('/{id}', [MenuController::class, 'destroy']);
        });                
    });        

    Route::group(['middleware' => 'Kasir'], function(){        
        Route::prefix('transaksi')->group(function () {            
            Route::post('/', [TransaksiController::class, 'store']);                         
        });        
    });
});

Route::post('/login', [AuthController::class, 'login']);





