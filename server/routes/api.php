<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;

Route::middleware('auth:sanctum')->get('/user', function(Request $request){
    return $request->user();
});

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/logout',[AuthController::class,'logout'])->middleware('auth:sanctum');


Route::prefix('categories')->controller(CategoryController::class)->group(function(){
    Route::get('/', 'index');
    Route::post('/','store');
    Route::get('/{category}','show');
    Route::put('/{category}', 'update');
    Route::delete('/{category}', 'destroy');
});

Route::prefix('products')->controller(ProductController::class)->group(function(){
    Route::get('/', 'index');
    Route::post('/', 'store');
    Route::get('/{product}', 'show');
    Route::put('/{product}', 'update');
    Route::delete('/{product}', 'destroy');
});