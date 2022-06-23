<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ColumnController;

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

Route::middleware(['api'])->group(function () {
  Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login'])->name("auth.login"); 
    Route::get('me', [AuthController::class, 'me'])->name("auth.me"); 
  });

  Route::apiResource("columns", ColumnController::class);
});