<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsMember;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;





// Route::get('/', [ProductController::class, 'index'])->name('sanpham.index');

//Admin

// Sản phẩm
Route::get('/sanpham/list', [ProductController::class, 'index'])->name('sanpham.list');

Route::get('/sanpham/create', [ProductController::class, 'create'])->name('sanpham.create');
Route::post('/sanpham/store', [ProductController::class, 'store'])->name('sanpham.store');

Route::delete('/sanpham/{id}/destroy', [ProductController::class, 'destroy'])->name('sanpham.destroy');

Route::get('/sanpham/{id}/edit', [ProductController::class, 'edit'])->name('sanpham.edit');
Route::put('/sanpham/{id}/update', [ProductController::class, 'update'])->name('sanpham.update');

// Danh mục
Route::get('/danhmuc/list', [CategoryController::class, 'index'])->name('danhmuc.list');

Route::get('/danhmuc/create', [CategoryController::class, 'create'])->name('danhmuc.create');
Route::post('/danhmuc/store', [CategoryController::class, 'store'])->name('danhmuc.store');

Route::delete('/danhmuc/{id}/destroy', [CategoryController::class, 'destroy'])->name('danhmuc.destroy');

Route::get('/danhmuc/{id}/edit', [CategoryController::class, 'edit'])->name('danhmuc.edit');
Route::put('/danhmuc/{id}/update', [CategoryController::class, 'update'])->name('danhmuc.update');



//Client

Route::get('/', [ProductController::class, 'indexUser'])->name('user.index');
// Route::get('/product/{id}', [ProductController::class, 'detail'])->name('product.detail');
// Route::get('/product/show/{id}', [ProductController::class, 'show'])->name('products.show');
// Route::get('/product/cart.{id}', [ProductController::class, 'addToCart'])->name('addproduct.to.cart');
// Route::get('/product-cart', [ProductController::class, 'productCart'])->name('shopping.cart');
// Route::delete('/cart/destroy/{id}', [ProductController::class, 'destroyCart'])->name('cart.destroy');

//cart
Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
//end cart

// Tối ưu code phần route
Route::prefix('product')
    // ->name('product.')
    ->controller(ProductController::class)
    ->group(function () {

        // Route::get('/',  'indexUser')->name('user.index');
        Route::get('{id}',  'detail')->name('product.detail');
        Route::get('show/{id}',  'show')->name('products.show');
        Route::get('cart.{id}', 'addToCart')->name('addproduct.to.cart');
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->prefix('order')
    // ->name('product.')
    ->controller(OrderController::class)
    ->group(function () {

        Route::get('list', 'index')->name('order.list');
   

        Route::get('create', 'create')->name('order.create');
        Route::post('store', 'store')->name('order.store');

        Route::get('show/{id}',  'show')->name('order.show');

        Route::put('{id}/update', 'update')->name('order.update');
    });

// Banner
Route::prefix('banner')
    // ->name('product.')
    ->controller(BannerController::class)
    ->group(function () {
        Route::get('list', 'index')->name('banner.list');
        // Route::get('bannerUser', 'indexUser')->name('bannerUser.list');

        Route::get('create', 'create')->name('banner.create');
        Route::post('store', 'store')->name('banner.store');

        Route::delete('{id}/destroy', 'destroy')->name('banner.destroy');

        Route::get('{id}/edit', 'edit')->name('banner.edit');
        Route::put('{id}/update', 'update')->name('banner.update');
    });
    
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware(['auth', IsAdmin::class]);
    Route::get('/member', [MemberController::class, 'dashboard'])->name('member.dashboard')->middleware(['auth', IsMember::class]);

    Route::get('homebanner', [BannerController::class, 'indexUser'])->name('homebanner');