<?php

use App\Models\Banner;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\Users1Controller;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PermissionController;

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
Route::middleware('preventBack')->group( function () {
        Route::get('/',[FrontendController::class,'index'])->name('Home');
        Route::get('/shop',[FrontendController::class,'shop'])->name('Shop');
        Route::get('/shopByCategory/{id}',[FrontendController::class,'shopByCategory']);
        Route::get('/shopProduct/{id}',[FrontendController::class,'shopProduct']);
        Route::get('/about-us', [AboutUsController::class, 'index'])->name('AboutUs');
        Route::get('/buynow/{id}',[FrontendController::class,'BuyNow'])->middleware(['auth', 'verified']);
        Route::post('/razorpay',[PaymentController::class,'payment'])->middleware(['auth', 'verified'])->name('payment');


});
Route::resource('permission',PermissionController::class);
Route::post('permission/store',[PermissionController::class,'store']);
Route::get('permission/{id}/destroy',[PermissionController::class,'destroy']);

Route::resource('role',RoleController::class);
Route::post('role/store',[RoleController::class,'store']);
Route::get('role/{id}/destroy',[RoleController::class,'destroy']);
Route::get('role/{id}/give-permissions',[RoleController::class,'addPermissionToRole']);
Route::put('role/{id}/give-permissions',[RoleController::class,'givePermissionToRole']);



Route::middleware('preventBack')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/about-us', [AboutUsController::class, 'list'])->name('admin.about.list');
        Route::get('/about-us/{id}', [AboutUsController::class, 'getOne']);
        Route::post('/about-us/store', [AboutUsController::class, 'store'])->name('admin.about.store');
        Route::delete('/about-us/{id}', [AboutUsController::class, 'destroy']);
        Route::post('/about-us/toggle-status/{id}', [AboutUsController::class, 'toggleStatus']);
    });
});


Route::get('/user',[Users1Controller::class,'create']);
Route::get('/post',[PostController::class,'create']);

Route::middleware('preventBack')->group(function(){
    Route::prefix('/dashboard')->group(function(){
        Route::get('/', [adminController::class, 'index'] )->middleware(['auth', 'verified'])->name('AdminDashboard');
        // Route::get('/dashboard', [ProductsController::class, 'index'] )->middleware(['auth', 'verified'])->name('dashboard');
        Route::get('/products', [ProductsController::class, 'index'] )->name('products');
        Route::prefix('products')->group(function(){
            Route::get('/{id}/edit', [ProductsController::class, 'edit']);
            Route::post('/save-item', [ProductsController::class, 'store'])->name('product.store');
            Route::post('/{id}/update', [ProductsController::class, 'update'])->name('product.update');
            Route::delete('/delete/{id}', [ProductsController::class, 'delete'])->name('product.delete');
        });

        Route::get('/banners',[BannerController::class,'index'])->name('bannerControl');
       
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
