<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
*/

/* COMMENT FOR AUTHENTICATION */

Route::get('/', function() {
	return response()->view("home");
});

Route::get('/query', 'Query@query');

Route::get('/register', function() {
	return Redirect::to('/');
}); 

Route::get('/login', function() {
	return Redirect::to('/');
}); 

/* COMMENT FOR AUTHENTICATION */



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


Route::group(['middleware' => 'web'], function () {
    
	/* UNCOMMENT ALL FOR AUTHENTICATION */
 //    Route::auth();

 //    Route::get('/', 'HomeController@index');

 //    Route::get('/query', 'Query@query');
	
	// Route::get('/logout', function() {
	// 	Auth::logout();
	// 	return Redirect::to("/login");
	// });
	/* UNCOMMENT ALL FOR AUTHENTICATION */

});
