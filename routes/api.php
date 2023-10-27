<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MetodoPagoController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

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

Route::prefix(['prefix' => 'auth'], function () {
  
});



Route::prefix('v1')->group(function () {

  Route::middleware(['api', 'auth:api'])->group(function () {
    Route::prefix('auth')->group(function () {
      Route::post('login', [AuthController::class, 'login'])->name('login')->withoutMiddleware(['auth:api']);
      Route::post('registro', [AuthController::class, 'registrar'])->name('auth.registro')->withoutMiddleware(['auth:api']);
      Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    });

    Route::apiResource('categorias', CategoriaController::class);
    Route::apiResource('metodos', MetodoPagoController::class);
    Route::apiResource('productos', ProductoController::class);
    Route::apiResource('usuarios', ProductoController::class);
  });

});