<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
*/

// Route::get('/', ['middleware' => 'auth', function() {
// 	return response()->view("home");
// }]);


Route::get('/logout', function() {
	Auth::logout();
	return Redirect::to("/login");
});

// Route::get('/test', function() {
// 	return Hash::make("nLegnD3Ecz3M");

// 	// stored: $2y$10$GbQYVhy9F6igCKHa021j1ONDkZdNekhlVUFZY0bKGtd8ZEKGFu7xC
// });




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
    Route::auth();

    Route::get('/', 'HomeController@index');

    Route::get('/query', 'Query@query');

});
