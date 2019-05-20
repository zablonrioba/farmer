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

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/index', function () {
    if(Auth::guest()){
        return view('auth.login');
    }
    else{
        return view('index');
    }
   
})->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/products','ProductController');
Route::get('/publish/{post}','ProductController@publish');
Route::get('/users','UserController@allusers');
Route::resource('/varieties','VarietyController');

Route::get('/categorystatus/{category}','VarietyController@status');
Route::post('/orders','OrderController@store');
Route::get('/orders','OrderController@index');


