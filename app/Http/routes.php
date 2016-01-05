<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
*/

Route::get('/', function() {
	// if session doesn't have the password, redirect to login with password screen
	// return dd(Session::get('logged_in'));	
	if (Session::get('logged_in') != 'true') {
    	return Redirect::to('/login');
    }

	return response()->view("index");
});

Route::get('/login', function() {
	return response()->view("login"); 
});

Route::post('/login', 'Query@login');


Route::get('/query', 'Query@query');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
