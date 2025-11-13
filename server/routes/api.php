<?php

use App\Http\Controllers\InstrumentsController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

//endpoint
Route::get('/x', function(){
    return 'API';
});

//Endpoint készítés
Route::get('instruments', [InstrumentsController::class, 'index']);
Route::get('instruments/{id}', [InstrumentsController::class, 'show']);
Route::post('instruments', [InstrumentsController::class, 'store']);
Route::delete('instruments/{id}', [InstrumentsController::class, 'destroy']);
Route::patch('instruments/{id}', [InstrumentsController::class, 'update']);
