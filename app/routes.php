<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*Route::get('/', function()
{
	return View::make('hello');
	

});

Route::get('/usuario', function(){
	return View::make('olakease');
});*/

Route::get('/', 'HomeController@showWelcome');
Route::any('/usuario', 'HomeController@olakease');

Route::get('/login', 'HomeController@login');
Route::post('/authenticate', 'HomeController@authenticate');

Route::get('/main', array( 'uses' => 'HomeController@main', 'before' => 'auth'));
Route::get('/logout', array('uses' => 'HomeController@logout', 'before' => 'auth'));

//Resource Controllers
Route::resource('user', 'UserController');
Route::resource('file', 'FileController');
