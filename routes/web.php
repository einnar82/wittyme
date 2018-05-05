<?php

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

Route::prefix('actions')->group(function () {
  Route::post('/photoword', 'PhotowordController@add');
  Route::get('/photoword', 'PhotowordController@get');
  Route::delete('/photoword/{id?}', 'PhotowordController@delete');
  Route::post('/photoword/{id?}', 'PhotowordController@update');
  //fixitup
  Route::post('/fixitup', 'FixItUpController@store');
  Route::get('/fixitup', 'FixItUpController@index');
  Route::delete('/fixitup/{id?}', 'FixItUpController@destroy');
  Route::put('/fixitup/{id?}', 'FixItUpController@update');
  //nymrush
  Route::resource('/nymrush', 'NymrushController');
});
Route::get('questions/photoword','PhotowordController@getTenQuestions');