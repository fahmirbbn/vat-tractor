<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RencanaKerjaController;
use App\Http\Controllers\API\UserController;

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

Route::group(['prefix' => 'v1'], function () {
    Route::post('register', [UserController::class, 'register']);
    Route::post('login', [UserController::class, 'login']);
    Route::post('logout', [UserController::class, 'logout']);
});

Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () {
    Route::group(['prefix' => 'rencana-kerja', 'as' => 'rencana_kerja.'], function () {
        Route::get('/', [RencanaKerjaController::class, 'index'])->name('index');
        Route::post('/', [RencanaKerjaController::class, 'store'])->name('store');
        Route::get('{id}', [RencanaKerjaController::class, 'show'])->name('show');
        Route::put('{id}', [RencanaKerjaController::class, 'update'])->name('update');
        Route::delete('{id}', [RencanaKerjaController::class, 'destroy'])->name('destroy');
    });
});
