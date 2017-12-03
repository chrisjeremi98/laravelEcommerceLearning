<?php

use App\User;
use App\Transaction;
use App\Product;
use App\Category;
use \Auth as Auth;
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
//    $userId=Auth
//

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

//bisa
Route::get('check', function (){

    $category= Category::find(3);
    foreach ($category->products as $product){

        echo $product->name."</br>";
    }

});

//check user role
Route::get('check3',function () {

    $user=User::find(3);

    return $user->role_id;
});

//mendapatkan role id
Route::get('check2', function(){

//   $checkuser=Auth::user();
//   return $checkuser->lists('id');

    $checkuser=Auth::id();
    $user=User::find($checkuser);
    return $user->role_id;

});

//mengambil data dari role user
Route::get('check4', function(){

    $user=User::find(3)->roles;
    return $user->lists('role_name');

});


//check role (ama_
Route::get('check5',function (){

    $user=User::find(3);
    if ($user->role_id==2){
        echo "hahaha";
    } else{
        echo "hihihi";
    }


});




Route::get('/food', 'ProductController@food');
Route::get('/beverage', 'ProductController@beverage');
Route::get('/merchandise', 'ProductController@merchandise');
Route::get('/subscriptionBox', 'ProductController@subscriptionBox');



//Middleware Admin
//Route::get('protected', ['middleware' => ['auth', 'admin'], function() {
//    return view('productUpload');
////}]);
Route::get('/admin',['middleware' => ['auth', 'admin'], function () {
    return view('admin_home');
}]);

Route::get('/isi',['middleware' => ['auth', 'admin'], function () {
    return view('productUpload');
}]);

Route::get('/productAll', 'ProductController@indexProductAdmin');

Route::resource('transaction','TransactionController');

Route::get('/transaksi_user', 'TransactionController@userTransaction');


//bagian untuk transaksi

