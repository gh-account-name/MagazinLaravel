<?php

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
Route::get('/', function () {
    return view('welcome');
})->name('aboutUs');

Route::get('/registration', [\App\Http\Controllers\PageController::class, 'registrationPage'])->name('registrationPage');

Route::get('/auth', [\App\Http\Controllers\PageController::class, 'authPage'])->name('authPage');

//--Функции

Route::post('/registration/save', [\App\Http\Controllers\UserController::class, 'register'])->name('register');

Route::post('/auth', [\App\Http\Controllers\UserController::class, 'auth'])->name('auth');

Route::get('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout');

Route::get('/catalog', [PageController::class, 'catalogPage'])->name('catalogPage');

//--Middleware

Route::group(['middleware'=>['auth', 'admin'], 'prefix'=>'admin'], function (){

    Route::get('/categories', [\App\Http\Controllers\PageController::class, 'categoriesPage'])->name('categoriesPage');

    Route::post('/addCategory', [\App\Http\Controllers\CategryController::class, 'addCategory'])->name('addCategory');

    Route::get('/edit/{category}', [\App\Http\Controllers\PageController::class, 'editCategoryPage'])->name('editCategoryPage');

    Route::put('/update/{category}', [\App\Http\Controllers\CategryController::class, 'update'])->name('updateCategory');

    Route::delete('/delete/{category}', [\App\Http\Controllers\CategryController::class, 'destroy'])->name('deleteCategory');

    Route::get('/products', [PageController::class, 'productsPage'])->name('productsPage');

    Route::post('/addProduct', [ProductController::class, 'addProduct'])->name('addProduct');

});




