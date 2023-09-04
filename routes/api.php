<?php

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

Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'books'], function () {
        Route::get('/list', [BookController::class, 'list'])->name('api.books.list');
        Route::get('/by-id/{id}', [BookController::class, 'byId'])->name('api.books.by-id');
        Route::post('/update/{id}', [BookController::class, 'update'])->name('api.books.update');
        Route::delete('/{id}', [BookController::class, 'destroy'])->name('api.books.destroy');
    });
});
