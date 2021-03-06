<?php

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

Route::get('/', function(){
    return Redirect::to('feed');
});

Route::get('feed', array('as' => 'feed.index', 'uses' => 'FeedController@index'));

Route::get('back', 'AdminController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
    'back' => 'AdminController',
]);

/*
Route::get('run', 'RunController@index' );*/