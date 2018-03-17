<?php

namespace App\Http\Controllers;

use App\Soup;
use Illuminate\Http\Request;

class SoupController extends Controller
{

	public function home()
	{
		$soup_1 = [
	        ['O','I','E'],
	        ['I','I','X'],
	        ['E','X','E'],
	    ];

		$soup_2 = [
			['E','I','O','I','E','I','O','E','I','O']
		];
		
		$soup_3 = [
			['E','A','E','A','E'],
			['A','I','I','I','A'],
			['E','I','O','I','E'],
			['A','I','I','I','A'],
			['E','A','E','A','E'],
		];
		
		$soup_4 = [
			['O','X'],
			['I','O'],
			['E','X'],
			['I','I'],
			['O','X'],
			['I','E'],
			['E','X'],
		];

		return view('welcome')->with([
			'soup_1' => $soup_1,
			'soup_2' => $soup_2,
			'soup_3' => $soup_3,
			'soup_4' => $soup_4,
		]);
	}
	public function solveSoup($id, $word)
	{
		$soup = new Soup($id);

		$times_found = $soup->find($word);
		$response = ['found' => $times_found];
		return response()->json($response);
	}


}
