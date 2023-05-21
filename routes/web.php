<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommandeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group([], function () {
    Route::get('/', [CommandeController::class, 'index']);
    Route::get('/commandes/create', [CommandeController::class, 'create']);
    Route::post('/commande', [CommandeController::class, 'store']);
    Route::get('/commandes/{commande}/edit', [CommandeController::class, 'edit']);
    Route::put('/commandes/{commande}', [CommandeController::class, 'update']);
    Route::delete('/commandes/{commande}', [CommandeController::class, 'destroy']);
});

// Route::get('/login', [AuthController::class,'authentication.login']);