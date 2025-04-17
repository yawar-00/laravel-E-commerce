<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductsController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/dashboard')->group(function(){
    Route::get('/', [adminController::class, 'index'] )->middleware(['auth', 'verified'])->name('AdminDashboard');
    // Route::get('/dashboard', [ProductsController::class, 'index'] )->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/products', [ProductsController::class, 'index'] )->middleware(['auth', 'verified'])->name('products');
});
Route::prefix('products')->group(function(){
    Route::post('/save-item', [ProductsController::class, 'store'])->name('product.store');
    Route::get('/{id}/edit', [ProductsController::class, 'edit']);
    Route::post('/{id}/update', [ProductsController::class, 'update'])->name('product.update');
    Route::delete('/delete/{id}', [ProductsController::class, 'delete'])->name('product.delete');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
