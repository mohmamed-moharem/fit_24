<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\authController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BanerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReviewController;

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

Route::get('/', [AppController::class,'index'])->name('app.index');

Route::get('/register', [authController::class, 'register'])->name('register');
Route::post('/register', [authController::class, 'store'])->name('register.store');
Route::get('login', [authController::class, 'login'])->name('login');
Route::post('login', [authController::class, 'authenticate'])->name('authenticate');
Route::post('logout', [authController::class, 'logout'])->name('logout');

Route::prefix('shop')->group(function () {
    Route::get('/', [ShopController::class,'index'])->name('shop.index');
    Route::get('/{product}', [ShopController::class,'productDetails'])->name('shop.details');
    Route::post('/{product}/review', [ReviewController::class, 'store'])->name('product.review');
    // Route::get('/', [AppController::class, 'search'])->name('shop.search');
});

Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index')->middleware('auth');
    Route::post('/{product}/add', [CartController::class, 'add'])->name('cart.add');
    Route::get('/{cart}/update', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/{cart}/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::delete('/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::prefix('order')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('order.index');
        Route::post('/order', [OrderController::class, 'store'])->name('order.store');
        Route::get('/{order}/deleverd', [OrderController::class, 'delivered'])->name('order.deleverd');
        Route::get('/{order}/pending', [OrderController::class, 'pending'])->name('order.pending');
        Route::get('/{order}/return', [OrderController::class, 'return'])->name('order.return');

    });
});
Route::prefix('about')->group(function () {
    Route::get('/', [AboutController::class, 'index'])->name('about.index');
    Route::post('/store', [AboutController::class, 'store'])->name('about.store');
});

Route::prefix('contect')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('contect.index');
    Route::post('/store', [ContactController::class, 'store'])->name('contect.store');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::prefix('categores')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.categores.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/{categore}/show', [CategoryController::class, 'show'])->name('category.show');
        Route::get('/{categore}/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/{categore}/update', [CategoryController::class, 'update'])->name('category.update');
        Route::get('/{categore}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');
        Route::get('/{categore}/restore', [CategoryController::class, 'restore'])->name('category.restore');
    });
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/{product}/update', [ProductController::class, 'update'])->name('product.update');
        Route::get('/{product}/delete', [ProductController::class, 'destroy'])->name('product.destroy');
        Route::get('{product}/restore', [ProductController::class, 'restore'])->name('product.restore');
    });
    Route::prefix('messages')->group(function () {
        Route::get('/', [ContactController::class, 'messages'])->name('admin.masseges.index');
        Route::put('/{message}/update', [ContactController::class, 'update'])->name('message.update');
    });
    Route::prefix('settings')->group(function () {
        Route::get('/', [AdminController::class, 'settings'])->name('admin.setting');
        Route::prefix('baner')->group(function () {
            Route::get('/', [BanerController::class, 'index'])->name('admin.baner.index');
            Route::get('/create', [BanerController::class, 'create'])->name('baner.create');
            Route::post('/store', [BanerController::class, 'store'])->name('baner.store');
            Route::get('/{baner}/edit', [BanerController::class, 'edit'])->name('baner.edit');
            Route::put('/{baner}/update', [BanerController::class, 'update'])->name('baner.update');
            Route::delete('/{baner}/destroy', [BanerController::class, 'destroy'])->name('baner.destroy');
        });
    });
});



// Route::middleware('auth')->group(function () {
//     Route::get('/my-account', [UserController::class, 'index'])->name('users.index');
// });
