<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

// Route::post('/search', 'SearchController@filter');

Route::any('/search','SearchController@basic_search');

Route::any('/advanced_search', 'SearchController@filter')->name('filter');

// Route::get('/profile', 'HomeController@profile')->name('profile');

Route::resource('videos', 'VideoController')->only(['index', 'show']);

// ------------------------ CART -------------------
Route::get('/shop', 'CartController@shop')->name('shop');

Route::get('/cart', 'CartController@cart')->name('cart.index');
Route::post('/add', 'CartController@add')->name('cart.store');
Route::post('/update', 'CartController@update')->name('cart.update');
Route::post('/remove', 'CartController@remove')->name('cart.remove');
Route::post('/clear', 'CartController@clear')->name('cart.clear');
Route::post('/checkout', 'CartController@checkout')->name('cart.checkout');
// original
// Route::post('/add', 'CartController@add')->name('cart.store');

// ----------------------------------  cart

Route::get('vueAdd/{video}', 'CartController@VueAdd');
Route::post('vueRemove/{video}', 'CartController@VueRemove');

//---------------------  the favourites  ---------------------------------

Route::get('favorite/{video}', 'VideoController@favoriteVideo');
Route::post('unfavorite/{video}', 'VideoController@unFavoriteVideo');

Route::get('users/profile/{user}', 'UsersController@index')->name('user_profile');

// middle ware stuff
Route::group(["middleware" => "auth"], function(){

  Route::get('/videos/download/{id}', 'VideoController@download')->name('download')->middleware('signed');
  Route::get('my_favorites', 'UsersController@myFavorites');
  Route::get('users/purchases/{user}', 'UsersController@myPurchases')->name('users.purchases');
});


Route::group(["middleware" => "App\Http\Middleware\IsAdmin"], function()
  {
    Route::match(["get", "post"], "/admin/home", "HomeController@adminHome")->name('admin.home');
    Route::get('/form', 'VideoController@form')->name('form');


    Route::resource('videos','VideoController')->except([
        'index', 'show'
    ]);

    Route::get('/admin/uploadVideo', 'VideoController@index')->name('admin.video');

  });

Route::get('/test', function(){
  return view('test_show');
});

//
Route::get('/contribute', 'UsersController@contribute')->name('contribute');
Route::get('/apply', 'UsersController@apply')->name('apply');
