<?php

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
})->name('abouUs');

Route::get('/registration', [\App\Http\Controllers\PageController::class, 'registrationPage'])->name('registrationPage');

Route::get('/auth', [\App\Http\Controllers\PageController::class, 'authPage'])->name('authPage');



//--Функции

Route::post('/registration/save', [\App\Http\Controllers\UserController::class, 'register'])->name('register');

Route::post('/auth', [\App\Http\Controllers\UserController::class, 'auth'])->name('auth');
