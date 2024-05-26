<?php

use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function() {
    Route::get('/', HomeController::class)->name('home');
    Route::post('/filter_posts', [HomeController::class, 'filterPosts'])->name('filter-posts');
    Route::post('/contact', ContactFormController::class)->name('contact');
});
