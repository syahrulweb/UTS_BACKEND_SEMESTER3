<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetshopeController;
use App\Http\Controllers\DigitalmediaController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/petshope', [PetshopeController::class, 'index']);
Route::post('/petshope', [PetshopeController::class, 'store']);



Route::get('/news', [DigitalmediaController::class, 'index']);
Route::post('/news', [DigitalmediaController::class, 'store']);
Route::get('/news/{id}', [DigitalmediaController::class, 'show']);
Route::put('/news/{id}', [DigitalmediaController::class, 'update']);
Route::delete('/news/{id}', [DigitalmediaController::class, 'destroy']);
Route::get('/news/search/{title}', [DigitalmediaController::class, 'searchByTitle']);
Route::get('/news/category/sport', [DigitalmediaController::class, 'getSportResource']);
Route::get('/news/category/cuaca', [DigitalmediaController::class, 'getCuacaResource']);
Route::get('/news/category/automotive', [DigitalmediaController::class, 'getAutomotiveResource']);