<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

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

Route::group(['prefix'=>'product'], function(){
   Route::get('/',[ProductController::class,'index'])->name('product.index');
   Route::post('/',[ProductController::class,'store'])->name('product.store');
   Route::delete('/{id}',[ProductController::class,'destroy'])->name('product.delete');
   Route::get('/{id}',[ProductController::class,'show'])->name('product.show');
   Route::put('/{id}',[ProductController::class,'update'])->name('product.update');
});
