<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {

	$query = DB::table('transplants');

	$columns = ["lung", "heart", "heart_lung", "age", "bmi", "diagnosis", "ethnicity", "gender", "inotropes", "ventilator", "ecmo", "one_yr", "five_yr", "ten_yr"];

	foreach ($columns as $col) {
		if (Request::has($col))
			$query->where($col, Request::input($col));
	}

	$results = $query->get();

	print_r($results);


    return response()
           ->view('welcome', ["text" => $results]); 
});

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
