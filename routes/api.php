<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ServicesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('login',[ LoginController::class,'index']);
Route::post('login',[ LoginController::class,'store']);
Route::get('test',[ LoginController::class,'test']);

Route::post('register',[ RegisterController::class,'index']);
Route::post('register',[ RegisterController::class,'store']);

Route::get('services',[ServicesController::class,'index']);



