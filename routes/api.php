<?php

use App\Http\Controllers\InformationsController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/informations', [InformationsController::class, 'getAllInfomations']);
Route::get('/informations/id/{id}', [InformationsController::class, 'getInfomation']);
Route::post('/informations', [InformationsController::class, 'store']);
Route::put('/informations/id/{id}', [InformationsController::class, 'updateInfomation']);
Route::delete('/informations/id/{id}', [InformationsController::class, 'destroy']);

Route::get('/users', [UsersController::class, 'getAllUsers']);
Route::get('/users/id/{id}', [UsersController::class, 'getUser']);
Route::post('/users', [UsersController::class, 'store']);
Route::put('/users/id/{id}', [UsersController::class, 'updateUser']);
Route::delete('/users/id/{id}', [UsersController::class, 'destroy']);
