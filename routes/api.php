<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\WorkerController;
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


Route::post('/register', [AuthenticationController::class, 'register']);

Route::post('/login', [AuthenticationController::class, 'login']);

Route::get('/services' ,[ServicesController::class,'showFeed']);

Route::post('/create-service', [ServicesController::class, 'createService']);

Route::post('/create-worker',[WorkerController::class,'createWorker']);
