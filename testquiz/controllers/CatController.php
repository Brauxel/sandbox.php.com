<?php
require('models/Cat.php');

/**
* Refer to - http://php.net/manual/en/function.sleep.php for sleep function in purr()
* obflush output to browser before completing sleep cycle
*/
class CatController extends Cat
{
	
	public function __construct()
	{
		//
	}

	public function purr($startdelay, $delay, $purrcount) {
		if($delay) {
			ob_implicit_flush(true);
			ob_end_flush();

			echo 'Starting to Purr in<br>';

			do {
				sleep(1);
				echo $startdelay.'<br>';
				$startdelay--;
			} while($startdelay);			

			for($i = 0; $i < $purrcount; $i++) {
				echo "Purr!<br>";
				sleep($delay);
			}
			echo 'Can I have some lasagna now?';
			ob_implicit_flush(false);			
		} else {
			echo 'Press "Run Purr" to run the function';
		}
	}
}
?>