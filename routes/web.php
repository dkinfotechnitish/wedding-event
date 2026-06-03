<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index'])->name('index');

Route::view('about', 'frontend.support.about')->name('about');
Route::view('contact', 'frontend.support.contact')->name('contact');
Route::view('terms-conditions', 'frontend.support.term-condition')->name('terms-conditions');
Route::view('privacy-policy', 'frontend.support.privacy-policy')->name('privacy-policy');
Route::view('faq', 'frontend.support.faq')->name('faq');
Route::view('career', 'frontend.support.career')->name('career');

// menu pages
Route::view('anniversary', 'frontend.menu.anniversary')->name('anniversary');
Route::view('birthday', 'frontend.menu.birthday')->name('birthday');
Route::view('catering', 'frontend.menu.catering')->name('catering');
Route::view('decorator', 'frontend.menu.decorator')->name('decorator');
Route::view('engagement', 'frontend.menu.engagement')->name('engagement');
Route::view('honey-moon', 'frontend.menu.honeymoon')->name('honeymoon');
Route::view('photography', 'frontend.menu.photography')->name('photography');
Route::view('reception', 'frontend.menu.reception')->name('reception');
Route::view('theme-entry', 'frontend.menu.theme-entry')->name('theme-entry');
Route::view('venue', 'frontend.menu.venue')->name('venue');
Route::view('wedding', 'frontend.menu.wedding')->name('wedding');

// Route::get('{url}', [FrontendController::class, 'servicePage'])
//     ->name('service.page');

// service page end

Route::view('login', 'layouts.login')->name('login');
Route::post('/login', [authController::class, 'login']);

Route::post('/logout', [authController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->name('admin.')->group(function () {

        Route::prefix('category')->name('category.')->group(function () {
            Route::get('/', 'App\Http\Controllers\CategoryController@index')->name('index');
            Route::get('/create', 'App\Http\Controllers\CategoryController@create')->name('create');
            Route::post('/', 'App\Http\Controllers\CategoryController@store')->name('store');
            Route::get('/{category}/edit', 'App\Http\Controllers\CategoryController@edit')->name('edit');
            Route::put('/{category}', 'App\Http\Controllers\CategoryController@update')->name('update');
            Route::delete('/{category}', 'App\Http\Controllers\CategoryController@destroy')->name('destroy');
        });

        Route::prefix('service')->name('service.')->group(function () {
            Route::get('/', 'App\Http\Controllers\ServiceController@index')->name('index');
            Route::get('/create', 'App\Http\Controllers\ServiceController@create')->name('create');
            Route::post('/', 'App\Http\Controllers\ServiceController@store')->name('store');
            Route::get('/{service}/edit', 'App\Http\Controllers\ServiceController@edit')->name('edit');
            Route::put('/{service}', 'App\Http\Controllers\ServiceController@update')->name('update');
            Route::delete('/{service}', 'App\Http\Controllers\ServiceController@destroy')->name('destroy');
        });

        Route::prefix('gallery')->name('gallery.')->group(function () {
            Route::get('/', 'App\Http\Controllers\GalleryController@index')->name('index');
            Route::get('/create', 'App\Http\Controllers\GalleryController@create')->name('create');
            Route::post('/', 'App\Http\Controllers\GalleryController@store')->name('store');
            Route::get('/{gallery}/edit', 'App\Http\Controllers\GalleryController@edit')->name('edit');
            Route::put('/{gallery}', 'App\Http\Controllers\GalleryController@update')->name('update');
            Route::delete('/{gallery}', 'App\Http\Controllers\GalleryController@destroy')->name('destroy');
        });

        Route::prefix('location')->name('location.')->group(function () {
            Route::get('/', 'App\Http\Controllers\LocationController@index')->name('index');
            Route::get('/create', 'App\Http\Controllers\LocationController@create')->name('create');
            Route::post('/', 'App\Http\Controllers\LocationController@store')->name('store');
            Route::get('/{location}/edit', 'App\Http\Controllers\LocationController@edit')->name('edit');
            Route::put('/{location}', 'App\Http\Controllers\LocationController@update')->name('update');
            Route::delete('/{location}', 'App\Http\Controllers\LocationController@destroy')->name('destroy');
        });
    });
});
