<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\OrderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('user')->group(function() {
    Route::post('/create', [UserController::class, 'signUp']);
    Route::get('/get-code/{phone:phone}', [UserController::class, 'get_code']);
    Route::post('/auth', [UserController::class, 'signIn']);
    Route::middleware('auth:sanctum')->group(function(){
        Route::delete('/logout/{user}', [UserController::class, 'logout']);
    });
});

Route::prefix('order')->group(function() {
    Route::prefix('task', function() {  });
    Route::middleware('auth:sanctum')->group(function(){
        Route::post('/', [OrderController::class, 'all']);
        Route::post('/show/{id}', [OrderController::class, 'show']);
        Route::post('/create', [OrderController::class, 'create']);
    });
});