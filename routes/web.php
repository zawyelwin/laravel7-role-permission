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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function() {
    Auth::routes(['register' => false]);
});


Route::group([
    'middleware' => ['auth'],
    'prefix' => 'admin'
], function() {

    Route::resource('users', 'UsersController');
    Route::resource('roles', 'RolesController');

    
    Route::get('password','ResetPasswordController@showPasswordResetFrom');
    Route::patch('password/change', 'ResetPasswordController@update')->name('password.change');
});


Route::get('/home', 'HomeController@index')->name('home');
