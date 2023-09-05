<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\BookController;
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

// Регистрация пользователей
//Route::post('/register', [AuthController::class, 'register']);

//Аутентификация пользователей
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'books'], function () {
            Route::get('/list', [BookController::class, 'list'])->name('api.books.list');
            Route::get('/by-id/{id}', [BookController::class, 'byId'])->name('api.books.by-id');
        Route::middleware('auth:api')->group(function (){
            Route::post('/update/{id}', [BookController::class, 'update'])->name('api.books.update');
            Route::delete('/{id}', [BookController::class, 'destroy'])->name('api.books.destroy');
        });
    });
});
