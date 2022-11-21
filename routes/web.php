<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//--Страницы
Route::get('/', [PageController::class, 'welcomePage'])->name('welcomePage');

Route::get('/registration', [\App\Http\Controllers\PageController::class, 'registrationPage'])->name('registrationPage');

Route::get('/auth', [\App\Http\Controllers\PageController::class, 'authPage'])->name('authPage');

//Route::get('/catalog', [PageController::class, 'catalogPage'])->name('catalogPage');

Route::get('/product/{product}', [PageController::class, 'productPage'])->name('productPage');

Route::get('/cart', [PageController::class, 'cartPage'])->name('cartPage');

Route::get('/orders', [PageController::class, 'ordersPage'])->name('ordersPage');

//--Функции

Route::post('/registration/save', [\App\Http\Controllers\UserController::class, 'register'])->name('register');

Route::post('/auth', [\App\Http\Controllers\UserController::class, 'auth'])->name('auth');

Route::get('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout');

Route::get('/catalog/filter', [ProductController::class, 'filter'])->name('filter');

Route::get('/catalog/sort', [ProductController::class, 'sort'])->name('sort');

Route::get('/catalog', [ProductController::class, 'sort_filter'])->name('catalogPage');

Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('addToCart');

Route::post('/cart/remove/{product}', [CartController::class, 'minus'])->name('removeFromCart');

Route::delete('/cart/delete/{product}', [CartController::class, 'destroy'])->name('deleteFromCart');

Route::put('/cart/order/{order}', [OrderController::class, 'update'])->name('makeAnOrder');

Route::delete('/order/delete/{order}', [OrderController::class, 'destroy'])->name('cancelOrder');

//--Middleware

Route::group(['middleware'=>['auth', 'admin'], 'prefix'=>'admin'], function (){

    Route::get('/categories', [\App\Http\Controllers\PageController::class, 'categoriesPage'])->name('categoriesPage');

    Route::post('/addCategory', [\App\Http\Controllers\CategryController::class, 'addCategory'])->name('addCategory');

    Route::get('/edit/{category}', [\App\Http\Controllers\PageController::class, 'editCategoryPage'])->name('editCategoryPage');

    Route::put('/update/{category}', [\App\Http\Controllers\CategryController::class, 'update'])->name('updateCategory');

    Route::delete('/delete/{category}', [\App\Http\Controllers\CategryController::class, 'destroy'])->name('deleteCategory');

    Route::get('/products', [PageController::class, 'productsPage'])->name('productsPage');

    Route::post('/addProduct', [ProductController::class, 'addProduct'])->name('addProduct');

    Route::get('/editProduct/{product}', [PageController::class, 'editProductPage'])->name('editProductPage');

    Route::put('/updateProduct/{product}', [ProductController::class, 'update'])->name('updateProduct');

    Route::delete('/deleteProduct/{product}', [ProductController::class, 'destroy'])->name('deleteProduct');

});




