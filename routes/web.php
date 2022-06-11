<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ReviewsController;

use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\SourcesController as AdminSourcesController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

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

Route::get('/logout', function() {
	Auth::logout();
	return redirect()->route('login');
})->name('account.logout');

Route::group(['middleware' => 'auth'], function() {
    //admin routes
    Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/', AdminController::class)
                ->name('index');
        Route::get('/parser', ParserController::class)
	    ->name('parser');
        Route::resource('/categories', AdminCategoryController::class);
        Route::resource('/news', AdminNewsController::class);
        Route::resource('/sources', AdminSourcesController::class);
        Route::get('/reviews', [ReviewsController::class, 'index'])
            ->name('reviews');
        Route::delete('/reviews/delete/{id}', [ReviewsController::class, 'delete'])
            ->name('reviews.delete');
        Route::get('/users', [AdminUserController::class, 'index'])
            ->name('users');
        Route::post('/users/update', [AdminUserController::class, 'update'])
            ->name('users.update');
    });

    Route::get('/account', AccountController::class)
	->name('account');
});

Route::group(['middleware' => 'guest'], function() {
    Route::get('/auth/{driver}/redirect', [SocialController::class, 'redirect'])
        ->name('social.redirect');
    Route::any('/auth/{driver}/callback', [SocialController::class, 'callback'])
        ->where('driver', '\w+')
        ->name('social.callback');
});
