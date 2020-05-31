<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

// Route::post('/search', 'SearchController@filter');

Route::any('/search','SearchController@basic_search');


Route::get('/profile', 'HomeController@profile')->name('profile');

Route::resource('videos', 'VideoController')->only([
    'index', 'show'
]);

// the favourites

Route::post('favorite/{video}', 'VideoController@favoriteVideo');
Route::post('unfavorite/{video}', 'VideoController@unFavoriteVideo');

Route::get('my_favorites', 'UsersController@myFavorites')->middleware('auth');

// middle ware stuff

Route::group(["middleware" => "App\Http\Middleware\IsAdmin"], function()
  {
    Route::match(["get", "post"], "/admin/home", "HomeController@adminHome")->name('admin.home');

    Route::resource('videos','VideoController')->except([
        'index', 'show'
    ]);


    Route::get('/admin/uploadVideo', 'VideoController@index')->name('admin.video');
    Route::get('/videos/download/{id}', 'VideoController@download')->name('downloadFile');

    Route::post('videos/create', 'VideoController@store')->name('video.create');

  });
