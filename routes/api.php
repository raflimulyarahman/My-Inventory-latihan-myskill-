<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware(['api'])->prefix('product')->group(function() {
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::post('/save', [ProductController::class, 'save'])->name('products.save');
    Route::delete('/{id}/delete', [ProductController::class, 'delete'])->name('products.delete'); 
});