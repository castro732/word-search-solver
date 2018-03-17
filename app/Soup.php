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

    		default:
				$this->content = null;
    			break;
    	}

    	$this->width = $this->soupWidth();
    	$this->height = $this->soupHeight();
	}

	public function soupWidth()
	{
		return strlen(implode($this->content[0]));
	}

	public function soupHeight()
	{
		return count($this->content);
	}
	/**
     * Search a given word horizontally in both directions (left to right, right to left)
     * and returns how many times it was found.
     *
     * @param  str  $word
     * @return int 
     */
    public function horizontalSearch($word)
	{
		$times_found = 0;

		foreach ($this->content as $row) {
			// Convert row to string
			$row_str = implode($row);

			// Perform the search in the string from left to right
			$times_found += $this->countWordInString($word, $row_str);

			// Reverse the row to perform search from right to left
			$row = array_reverse($row);
			$row_str = implode($row);
			$times_found += $this->countWordInString($word, $row_str);
		}
		// Return the word found counter
		return $times_found;
	}

	/**
     * Search a given word vertically in both directions (top to bottom, bottom to top)
     * and returns how many times it was found.
     *
     * @param  str  $word
     * @return int 
     */
	public function verticalSearch($word)
	{
		$times_found = 0;

		// Perform the search in columns
		for ($i=0; $i < $this->width; $i++) { 
			// Get column to perform search
			$column = array_column($this->content, $i);
			// Convert column to string
			$column_str = implode($column);

			// Perform the search in the string from top to bottom
			$times_found += $this->countWordInString($word, $column_str);

			// Reverse the column to perform search from bottom to top
			$column = array_reverse($column);
			$column_str = implode($column);
			$times_found += $this->countWordInString($word, $column_str);

		}
		// Return the word found counter
		return $times_found;
	}
     * Counts how many times a given word appears in a given string
     * and returns how many times it was found.
     *
     * @param  str  $word
     * @return str  $string
     */
	public function countWordInString($word, $string)
	{
		$times_found = 0;
		$word_position = strpos($string, $word);
		while ($word_position !== FALSE) {
			$times_found++;
			$word_position = strpos($string, $word, $word_position+strlen($word));
		}
		return $times_found;
	}

	/**
     * Gets the diagonals of the given matrix (soup), returning the
     * diagonals that could contain a word of given $word_length
     *
     * @param  array  	$soup
     * @param  int 		$word_length
     * @return array
     */
	private function getDiagonals($soup, $word_length)
	{
		$current_soup = $soup;
		// Iterate over the current soup diagonally, in order to find the main diagonal and down
		for ($i=0; $i <= $this->width - $word_length; $i++) { 
			for ($j=0; $j < sizeof($current_soup); $j++) {
				// Store each element in a new array
				$diagonal[] = $current_soup[$j][$j];
			}
			// Store the found diagonal in another array that will contain every other diagonal
			$diagonals[] = $diagonal;
			// Clean diagonal array
			$diagonal = [];
			// Remove topmost row and rightmost column
			array_shift($current_soup);
			foreach ($current_soup as &$row) {
				array_pop($row);
			}
		}

		// Reset current_soup to initial value, to find diagonals from the main and up
		$current_soup = $soup;
		// As the main diagonal is already stored, remove last row and leftmost column
		array_pop($current_soup);
		foreach ($current_soup as &$row) {
			array_shift($row);
		}

		// Iterate over starting from 1 - As the main diagonal was already stored
		for ($i=1; $i <= $this->width - $word_length; $i++) { 
			for ($j=0; $j < sizeof($current_soup); $j++) { 
				$diagonal[] = $current_soup[$j][$j];
			}
			$diagonals[] = $diagonal;
			$diagonal = [];
			array_pop($current_soup);
			foreach ($current_soup as &$row) {
				array_shift($row);
			}
		}
		// Return all the diagonals found as an array
		return $diagonals;
	}
}


