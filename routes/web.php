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

Route::get('/', [ 
  'uses' => 'HomeController@home',
  'as' => 'home' 
]);

Route::get('/login', [ 
  'uses' => 'HomeController@home',
  'as' => 'login' 
]);

Route::get('/dashboard', [ 
  'uses' => 'HomeController@home',
  'as' => 'dashboard' 
]);

Route::get('/photoword', [ 
  'uses' => 'HomeController@home',
  'as' => 'photoword' 
]);

Route::get('/nymrush', [ 
  'uses' => 'HomeController@home',
  'as' => 'nymrush' 
]);