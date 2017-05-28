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

	public function getSum(array $numbers) {
		$this->answers[] = 'The sum of all the given values is ' . array_sum($numbers);

		return $this->answers[2];
	}

	public function loopTests() {
		echo '1) The for loop:<br><br>';

		for( $i=0; $i<32; $i++ ) {
			echo 'Iteration '. ($i+1) .'<br>';

			//Let's generate an array to use for the foreach loop as well
			$iterations[] = $i;
		}

		echo '<br><br>2) The foreach (using an array created in the for loop) loop:<br><br>';

		foreach( $iterations as $i ) {
			echo 'Iteration '. ($i+1) .'<br>';
		}

		echo '<br><br>3) The while loop:<br><br>';

		// Let's re-declare $i to be used as an increment in the while loop
		$i = 0;

		while( $i<32 ) {
			$i++;
			echo 'Iteration '. $i .'<br>';
		}

		echo '<br><br>4) The do-while loop:<br><br>';

		// Let's re-declare $i to be used as an increment in the while loop
		$i = 0;

		do {
			$i++;
			echo 'Iteration '. $i .'<br>';
		} while ( $i < 32);

		return 'For Loop, Foreach Loop, While Loop and Do While Loop';
	}

	public function alphaNumericExplode(string $query) {
		preg_match_all('/\d+/', $query, $numbers);
		preg_match_all('/[^\d]+/', $query, $words);

		return array_merge($words, $numbers);
	}

	public function containsWithin(string $haystack, string $needle) {
		$pos = stripos($haystack, $needle);
		//die(var_dump($pos));

		if($pos >= 0) {
			$this->answers[] = 'The string was found at poistion '. $pos;
		} else {
			$this->answers[] = 'The string was not found';
		}
		

		return $this->answers[7];
	}
}

?>