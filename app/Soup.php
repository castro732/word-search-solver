<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soup extends Model
{

	protected $width;
	protected $height;

	function __construct($id) {

		switch ($id) {
    		case 1:
    			$this->content =  [
			        ['O','I','E'],
			        ['I','I','X'],
			        ['E','X','E'],
			    ];

			    $this->width;
    			break;

			case 2:
				$this->content = [
					['E','I','O','I','E','I','O','E','I','O']
				];
				break;

			case 3:
				$this->content = [
					['E','A','E','A','E'],
					['A','I','I','I','A'],
					['E','I','O','I','E'],
					['A','I','I','I','A'],
					['E','A','E','A','E'],
				];
				break;

			case 4:
				$this->content = [
					['O','X'],
					['I','O'],
					['E','X'],
					['I','I'],
					['O','X'],
					['I','E'],
					['E','X'],
				];
				break;

    	$this->width = $this->soupWidth();
	}
}


