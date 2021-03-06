<?php

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
use Illuminate\Support\Facades\Route;

    Route::group(['prefix' => ''], function () {
    Route::get('/', 'MainController@Index')->name('main');
});

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/login', function (){
        return view('auth/login');
    })->name('login');

    Route::get('/register',function (){
        return view('auth/register');
    })->name('register');

    Route::group(['prefix'=> 'lk','auth'], function (){

        Route::get('/myProducts',function (){
           return view('/lk/myProducts');
        })->name('myProducts')->middleware('auth');

        Route::get('getMyProducts','RentController@getMyProducts')->name('getMyProducts');

        Route::get('/rent', function (){
            return view('lk/rent');
        })->name('rent')->middleware('auth');

        Route::post('/rent/search', 'RentController@search')->name('RentSearch');
        Route::get('/cart', function (){
           return view('lk/cart');
        })->middleware('auth')->name('cart');
       Route::post('/buyCart','RentController@buyCart')->name('buyCart');
        Route::get('slopes', 'AdminController@slopes')->name('slopes');

    });

    Route::group(['prefix'=>'/admin','auth'],function(){

        Route::get('/','AdminController@index')->name('adminMain');
        Route::get('/getUsers','AdminController@getUsers')->name('getUsers');
        Route::get('/getBalanceUser','AdminController@getBalanceUser')->name('getBalanceUser');
        Route::post('/addBalanceUser','AdminController@addBalanceUser')->name('addBalanceUser');
        Route::get('/products','AdminController@products')->name('products');
        Route::get('/getProducts','AdminController@getProducts')->name('getProducts');
        Route::get('/getProduct','AdminController@getProduct')->name('getProduct');
        Route::get('/deleteProduct','AdminController@deleteProduct')->name('deleteProduct');
        Route::post('/addProduct','AdminController@addProduct')->name('addProduct');
        Route::post('/editProduct','AdminController@editProduct')->name('editProduct');
        Route::post('/endTime','AdminController@endTime')->name('endTime');
        Route::get('/getRentInfo','AdminController@getRentInfo')->name('getRentInfo');
        Route::post('/userLocation', 'AdminController@userLocation')->name('userLocation');
});

