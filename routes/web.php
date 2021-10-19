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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

// Route::patch('update-cart', 'OrderController@update')->name('update.cart');

// Route::delete('remove-from-cart', 'OrderController@remove')->name('remove.from.cart');

// Route::get('services', 'OrderController@index');
// Route::get('cart', 'OrderController@cart')->name('cart');
// Route::get('add-to-cart/{id}', 'OrderController@addToCart')->name('add.to.cart');


Route::resource('/', CustomersController::class);
Route::resource('customers', CustomersController::class);
Route::resource('order', OrdersController::class);


Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', AddUserController::class)->middleware('admin');
    Route::resource('addservices', ServicesController::class)->middleware('admin');
    Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
    Route::resource('orders', AllOrdersController::class)->middleware('admin');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/user', 'UsersController@index')->name('user')->middleware('user');
    //Route::resource('orders', OrdersController::class)->middleware('user');
    Route::patch('update-cart', 'OrderController@update')->name('update.cart');

    Route::delete('remove-from-cart', 'OrderController@remove')->name('remove.from.cart');

    Route::get('services', 'OrderController@index')->middleware('user');
    Route::get('cart', 'OrderController@cart')->name('cart')->middleware('user');
    Route::get('add-to-cart/{id}', 'OrderController@addToCart')->name('add.to.cart');
});