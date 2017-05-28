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

	public function query1(string $entry) {
		if ( ctype_upper($entry[0]) ) {
			$this->answers[] = 'The provided string starts with a uppercase letter';
		} else {
			$this->answers[] = 'The provided string does not start with a uppercase letter';

		}
		
		return $this->answers[0];
	}
}

?>