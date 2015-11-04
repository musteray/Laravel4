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

Route::get('/', function()
{
	return View::make('hello');
});

// Route::get('users', function()
// {
//     $users = User::all();

//     return View::make('users')->with('users', $users);
// });

// Route::get('welcome', 'HomeController@showWelcome');


// Two ways to attach a controller..
// Method 1
// Route::get('user', 'UserController@showProfile');

// Method 2
// Route::get('twoUser', array('uses'=>'UserController@showProfile') );

// RestFul API and Search
Route::get('search', 'UserController@searchField');
Route::get('logout', 'UserController@logOut');


// Crud for User
Route::resource('api', 'UserController');


// Crud for Client 
Route::get('Logout', 'ClientController@doLogout');
Route::get('query', 'ClientController@searchData');
Route::resource('crud', 'ClientController');

