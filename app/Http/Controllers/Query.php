<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Request;
use Redirect; 
use Cookie;
use Auth;
// use Session; 
use Illuminate\Support\Facades\Session;

class Query extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function query()
    {
    	/* UNCOMMENT FOR AUTHENTICATION */
		// if (!Auth::check()) 
		// 	return Redirect::to("/");
		/* UNCOMMENT FOR AUTHENTICATION */
		

    	$query = DB::table('transplants');

		$columns = ["age", "bmi", "diagnosis", "ethnicity", "gender", "inotropes", "ventilator", "ecmo"];

		// require columns: ORGAN and SURVIVAL
		if (!Request::has("organ") || !in_array(Request::input("organ"), ["lung", "heart", "heart_lung"]))
			return response()->view('sorry', ["apology" => "please specify the transplanted organ"]);
		else if (!Request::has("survival"))
			return response()->view('sorry', ["apology" => "please specify the time elapsed after organ transplant"]);

		$query->where(Request::input("organ"), 1); 

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
					if (Request::input("organ") == "heart" && (Request::input("diagnosis") < 1 || Request::input("diagnosis") > 7))
						return response()->view('sorry', ["apology" => "incorrect organ-to-diagnosis selection"]);

					else if (Request::input("organ") == "lung" && (Request::input("diagnosis") < 8 || Request::input("diagnosis") > 12))
						return response()->view('sorry', ["apology" => "incorrect organ-to-diagnosis selection"]);

					else if (Request::input("organ") == "heart_lung" && (Request::input("diagnosis") < 8 || Request::input("diagnosis") > 12))
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
		$years_elapsed = Request::input("survival");

		$survived = 0.0;
		$died = 0.0;


		foreach ($results as $patient) {
			if ($patient->{$years_elapsed} == 2)
				$survived += 1.0;
			else if ($patient->{$years_elapsed} == 1)
				$died += 1.0;
		}

		$rates = [
			"heart" => [
				"one_yr" => 85.2,
				"five_yr" => 69.5,
				"ten_yr" => 52.5
			],
			"lung" => [
				"one_yr" => 82.3,
				"five_yr" => 43.5,
				"ten_yr" => 21.4
			],
			"heart_lung" => [
				"one_yr" => 68,
				"five_yr" => 36.4,
				"ten_yr" => 23.4
			]
		];
		// for matches
		$total = $died + $survived;

		if ($total == 0)
			return 0;

		$response = ["matched" => $total, "similar_patients" => $survived / $total, "average" => $rates[Request::input("organ")][$years_elapsed]];

		// process the results
		// 
		
		return response()->json($response);

		// return response()->json($results);
    }

}
