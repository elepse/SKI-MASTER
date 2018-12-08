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


        Route::get('/rent', function (){
            return view('lk/rent');
        })->name('rent')->middleware('auth');

        Route::post('/rent/search', 'RentController@search')->name('RentSearch');
    });

    Route::group(['prefix'=>'/admin','auth'],function(){

        Route::get('/','AdminController@index')->name('adminMain');
        Route::get('/getUsers','AdminController@getUsers')->name('getUsers');

});

