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

	public function query1($entry) {
		$this->answers[] = $entry;
		
		return $this->answers[0];
	}
}

?>