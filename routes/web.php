<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ReviewsController;

use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\SourcesController as AdminSourcesController;

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

Route::get('/about', [AboutController::class, 'index'])
        ->name('about');

Route::get('/category', [CategoryController::class, 'index'])
        ->name('category');

Route::get('/category/{id}', [CategoryController::class, 'list'])
        ->name('category.news');

Route::get('/news', [NewsController::class, 'index'])
        ->name('news');

Route::get('/news/{id}', [NewsController::class, 'show'])
        ->name('news.show');

Route::post('/reviews/save', [ReviewsController::class, 'save'])
        ->name('reviews.save');

//admin routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', AdminController::class)
            ->name('index');
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
    Route::resource('/sources', AdminSourcesController::class);
    Route::get('/reviews', [ReviewsController::class, 'index'])
        ->name('reviews');
    Route::delete('/reviews/delete/{id}', [ReviewsController::class, 'delete'])
        ->name('reviews.delete');
});
