<?php
require_once('models/Quiz.php');

/**
* Quiz Controller extending models/Quiz.php 
*/
class QuizController extends Quiz
{
	
	public function __construct()
	{
		return 'QuizController ready';
	}

	public function checkFirstCase(string $entry) {
		if ( ctype_upper($entry[0]) ) {
			$this->answers[] = 'The provided string ('.$entry.') starts with a uppercase letter';
		} else {
			$this->answers[] = 'The provided string ('.$entry.') does not start with a uppercase letter';

		}
		
		return $this->answers[0];
	}

	public function getArea(float $radius) {
		$this->answers[] = 'The area of the circle is ' . M_PI * ($radius ** 2);

		return $this->answers[1];
	}
}

?>