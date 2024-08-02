<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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



//User

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

        Route::get('/',  'indexUser')->name('user.index');
        Route::get('{id}',  'detail')->name('product.detail');
        Route::get('show/{id}',  'show')->name('products.show');
        Route::get('cart.{id}', 'addToCart')->name('addproduct.to.cart');
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
