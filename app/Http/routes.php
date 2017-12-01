<?php

use App\User;
use App\Transaction;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

//Route::get('/shop', function(){
//   return view('shop');
//
//});

Route::resource('shop','ProductController');

Route::resource('cart', 'CartController');
Route::delete('emptyCart', 'CartController@emptyCart');
Route::post('switchToWishlist/{id}', 'CartController@switchToWishlist');

Route::resource('wishlist', 'WishlistController');
Route::delete('emptyWishlist', 'WishlistController@emptyWishlist');
Route::post('switchToCart/{id}', 'WishlistController@switchToCart');

Route::resource('transaction', 'TransactionController');


Route::get('/logout',function (){
    Auth::logout();
    Session::flush();
    return Redirect::to('/');

});


Route::get('check', function (){

    $transaction= Transaction;

    $transaction->users->name;



});

Route::get('/isi', function () {
    return view('productUpload');
});

Route::get('/food', 'ProductController@food');
Route::get('/beverage', 'ProductController@beverage');
Route::get('/merchandise', 'ProductController@merchandise');
Route::get('/subscriptionBox', 'ProductController@subscriptionBox');

