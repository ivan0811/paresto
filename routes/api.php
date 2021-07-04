<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\API\AuthController;

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
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::group(['middleware' => 'Admin'], function(){
        Route::get('/test', [UserController::class, 'coba']);
    });

    Route::group(['middleware' => 'Pelayan'], function(){

    });

    Route::group(['middleware' => 'Koki'], function(){

    });

    Route::group(['middleware' => 'Kasir'], function(){

    });
});

Route::post('/login', [AuthController::class, 'login']);





