<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware('auth')->group(function () {

    /* Product Controller */

    Route::get('/phone-list', [App\Http\Controllers\ProductController::class, 'intex'])->name('phone-list');

    Route::post('/insert-comment', [App\Http\Controllers\ProductController::class, 'insertComment'])->name('insert-comment');
    Route::get('/insert-product', [App\Http\Controllers\ProductController::class, 'insertProduct'])->name('insert-product');
    Route::post('/insert-product', [App\Http\Controllers\ProductController::class, 'insert']);

    Route::get('/show-product-data', [App\Http\Controllers\ProductController::class, 'index'])->name('show-product-data');
    Route::get('/show-products', [App\Http\Controllers\ProductController::class, 'getAll'])->name('show-product');

    Route::post('/update-product', [App\Http\Controllers\ProductController::class, 'update'])->name('update-product');
    Route::get('/update-product/{id}', [App\Http\Controllers\ProductController::class, 'updateProduct']);

    // Route::post('/delete-product/{id}', [App\Http\Controllers\ProductController::class, 'delete'])->name('delete-product');
    Route::post('/delete-product', [App\Http\Controllers\ProductController::class, 'delete'])->name('delete-product');


    /* Brand */

    Route::post('/insert-brand', [App\Http\Controllers\BrandController::class, 'insert'])->name('insert-brand');
    Route::get('/insert-brand', [App\Http\Controllers\BrandController::class, 'insertBrand']);

    Route::get('/show-brand', [App\Http\Controllers\BrandController::class, 'getAll'])->name('show-brand');

    Route::get('/delete-brand/{id}', [App\Http\Controllers\BrandController::class, 'delete']);

    Route::post('/update-brand', [App\Http\Controllers\BrandController::class, 'update'])->name('update-brand');
    Route::get('/update-brand/{id}', [App\Http\Controllers\BrandController::class, 'updateBrand']);

    /* Cart */

    Route::get('/shopping-cart', [App\Http\Controllers\CartController::class, 'indexCart'])->name('shopping-cart');
    Route::get('/product/{id}', [App\Http\Controllers\CartController::class, 'indexAdd'])->name('product');
    Route::post('/add/{id}', [App\Http\Controllers\CartController::class, 'addCart'])->name('add');

    Route::post('/shopping-cart/{id}', [App\Http\Controllers\CartController::class, 'checkout'])->name('checkout');

    Route::get('/cart/data', [App\Http\Controllers\CartController::class, 'getCartData'])->name('cart.data');


    Route::post('/delete-cart', [App\Http\Controllers\CartController::class, 'removeCart'])->name('remove-cart');
    // Route::post('/remove-cart/{id}/', [App\Http\Controllers\CartController::class, 'removeCart'])->name('remove-cart');

    /* Transaction */

    Route::get('/history-transaction', [App\Http\Controllers\CartController::class, 'history'])->name('history-transaction');
    Route::post('/history-detail/{id}', [App\Http\Controllers\CartController::class, 'detailTransaction'])->name('transaction-detail');

});


Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard')->middleware('auth');
