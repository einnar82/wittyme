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

Route::get('/fixitup', [ 
  'uses' => 'HomeController@home',
  'as' => 'fixitup' 
]);

Route::get('/administrator', [ 
  'uses' => 'HomeController@admin',
  'as' => 'administrator' 
]);

Route::prefix('administrator')->group(function () {

  Route::get('photoword', [ 
    'uses' => 'HomeController@admin',
    'as' => 'admin.photoword' 
  ]);

  Route::get('nymrush', [ 
    'uses' => 'HomeController@admin',
    'as' => 'admin.nymrush' 
  ]);

  Route::get('fixitup', [ 
    'uses' => 'HomeController@admin',
    'as' => 'admin.fixitup' 
  ]);

  Route::get('login', [ 
    'uses' => 'HomeController@login',
    'as' => 'admin.login' 
  ]);
});

Route::post('/register', [
    'uses' => 'UsersController@register',
    'as' => 'register'
]);


Route::post('actions/photoword', 'PhotowordController@add');
Route::get('actions/photoword', 'PhotowordController@get');
Route::delete('actions/photoword/{id?}', 'PhotowordController@delete');
Route::post('actions/photoword/{id?}', 'PhotowordController@update');

Route::resources([
  'actions/nymrush' => 'NymrushController',
  'actions/fixitup' => 'FixItUpController'
]);