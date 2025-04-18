<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\Users1Controller;
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
// preventBack
Route::middleware('preventBack')->get('/', function () {
    return view('welcome');
});

Route::get('/user',[Users1Controller::class,'create']);
Route::get('/post',[PostController::class,'create']);

Route::middleware('preventBack')->group(function(){
    Route::prefix('/dashboard')->group(function(){
        Route::get('/', [adminController::class, 'index'] )->middleware(['auth', 'verified'])->name('AdminDashboard');
        // Route::get('/dashboard', [ProductsController::class, 'index'] )->middleware(['auth', 'verified'])->name('dashboard');
        Route::get('/products', [ProductsController::class, 'index'] )->middleware(['auth', 'verified'])->name('products');
        Route::prefix('products')->group(function(){
            Route::post('/save-item', [ProductsController::class, 'store'])->name('product.store');
            Route::get('/{id}/edit', [ProductsController::class, 'edit']);
            Route::post('/{id}/update', [ProductsController::class, 'update'])->name('product.update');
            Route::delete('/delete/{id}', [ProductsController::class, 'delete'])->name('product.delete');
        });

        Route::get('/banners',[BannerController::class,'index'])->middleware(['auth', 'verified'])->name('bannerControl');
       
    });
});
Route::prefix('banners')->group(function(){
    Route::post('/save-item', [BannerController::class, 'store'])->name('banner.store');
    Route::get('/{id}/edit', [BannerController::class, 'edit']);
    Route::post('/{id}/update', [BannerController::class, 'update']);
    Route::delete('/deletes/{id}', [BannerController::class, 'delete']);
    // /banners/makeActive/
    Route::post('/makeActive/{id}', [BannerController::class, 'makeActive']);

    
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
