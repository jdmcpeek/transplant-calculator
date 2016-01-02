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

Route::get('/', function() {
	return response()->view("index");
});


Route::get('/query', function () {

	$query = DB::table('transplants');

	$columns = ["lung", "heart", "heart_lung", "age", "bmi", "diagnosis", "ethnicity", "gender", "inotropes", "ventilator", "ecmo", "one_yr", "five_yr", "ten_yr"];

	// require columns: ORGAN and SURVIVAL
	if (!Request::has("lung") && !Request::has("heart") && !Request::has("lung"))
		return response()->view('sorry', ["apology" => "please specify the transplanted organ"]);
	else if (!Request::has("one_yr") && !Request::has("five_yr") && !Request::has("ten_yr"))
		return response()->view('sorry', ["apology" => "please specify the time elapsed after organ transplant"]);

	foreach ($columns as $col) {
		if (Request::has($col)) {
			if ($col == "age") {
				if (Request::input($col) < 0)
					return response()->view('sorry', ["apology" => "the input age is out of range"]);
				else if (Request::input($col) >= 0 && Request::input($col) <= 1)
					$query->whereBetween("age", [0, 1]);
				else if (Request::input($col) <= 5)
					$query->whereBetween("age", [2, 5]);
				else if (Request::input($col) <= 12)
					$query->whereBetween("age", [6, 12]);
				else if (Request::input($col) <= 18)
					$query->whereBetween("age", [13, 18]);
				else
					return response()->view('sorry', ["apology" => "the input age is out of range"]);
			}
			else if ($col == "bmi") {
				if (Request::input($col) < 7)
					return response()->view('sorry', ["apology" => "the input bmi is out of range"]);
				else if (Request::input($col) >= 7 && Request::input($col) <= 12)
					$query->whereBetween("bmi", [7, 12]);
				else if (Request::input($col) <= 20)
					$query->whereBetween("bmi", [13, 20]);
				else if (Request::input($col) <= 29)
					$query->whereBetween("bmi", [21, 29]);
				else if (Request::input($col) >= 30)
					$query->where("bmi", ">", "29");
				else
					return response()->view('sorry', ["apology" => "the input bmi is out of range"]);							
			}
			else if ($col == "diagnosis") {
				// dealing with lung patients
				if (Request::input("heart") == 1 && (Request::input("diagnosis") < 1 || Request::input("diagnosis") > 7))
					return response()->view('sorry', ["apology" => "incorrect organ-to-diagnosis selection"]);

				else if (Request::input("lung") == 1 && (Request::input("diagnosis") < 8 || Request::input("diagnosis") > 12))
					return response()->view('sorry', ["apology" => "incorrect organ-to-diagnosis selection"]);

				else if (Request::input("heart_lung") == 1 && (Request::input("diagnosis") < 8 || Request::input("diagnosis") > 12))
					return response()->view('sorry', ["apology" => "incorrect organ-to-diagnosis selection"]);

				else
					$query->where($col, Request::input($col));

			}
			else {
				$query->where($col, Request::input($col));
			}
		}
	}

	$results = $query->get();

	return response()->json($results);

    // return response()
           // ->view('queryresults', ["text" => $results, "query" => Request::all()]); 
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
