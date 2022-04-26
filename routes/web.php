<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', [AboutController::class, 'index']);

Route::get('/category', [CategoryController::class, 'index'])
        ->name('category');

Route::get('/category/{id}', [CategoryController::class, 'list'])
        ->name('category.news');

Route::get('/news', [NewsController::class, 'index'])
        ->name('news');

Route::get('/news/{id}', [NewsController::class, 'show'])
        ->name('news.show');
