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

	public function bestMatch($array1, $array2) {
		/*foreach($array1 as $outerquery) {
			$outerstring = explode(" ",$outerquery);

			foreach ($array2 as $innerquery) {
				$innerstring = explode(" ", $innerquery);

				foreach ($outerstring as $os) {
					foreach ($innerstring as $is) {
						if($this->normalizeChars($os) == $this->normalizeChars($is)) {
							//echo $is;	
							print_r($outerstring);
							echo '=';
							print_r($innerstring);
							echo '<br>';
						}
						
					}
				}
			}
		}*/

		foreach ($array1 as $a1) {
			$cleana1 = $this->normalizeChars($a1);
			$cleana1 = strtolower($cleana1);
			$cleana1 = preg_replace("/[^a-zA-Z]+/", "", $cleana1);
			//$stringParts = str_split($cleana1);
			//sort($stringParts);
			//$cleana1 = implode('', $stringParts);

			//echo $cleana1.'<br>';

			foreach ($array2 as $a2) {
				$cleana2 = $this->normalizeChars($a2);
				$cleana2 = strtolower($cleana2);
				$cleana2 = preg_replace("/[^a-zA-Z]+/", "", $cleana2);
				//$stringParts = str_split($cleana2);
				//sort($stringParts);
				//$cleana2 = implode('', $stringParts);
				//echo $cleana2. '<br>';

				$pos = stripos($cleana1, $cleana2);
				//echo $cleana1. ' = '. $cleana2. ' '. $pos. '<br>';
				//echo $pos;

				if($pos > 0) {
					echo $a1. '='. $a2.'<br>';
				} else {
					//
				}

			}
		}
	}

	/**
	 * Replace language-specific characters by ASCII-equivalents.
	 * @param string $s
	 * @return string
	 * https://stackoverflow.com/questions/3371697/replacing-accented-characters-php
	 */
	public static function normalizeChars($s) {
	    $replace = array(
	        'ъ'=>'-', 'Ь'=>'-', 'Ъ'=>'-', 'ь'=>'-',
	        'Ă'=>'A', 'Ą'=>'A', 'À'=>'A', 'Ã'=>'A', 'Á'=>'A', 'Æ'=>'A', 'Â'=>'A', 'Å'=>'A', 'Ä'=>'Ae',
	        'Þ'=>'B',
	        'Ć'=>'C', 'ץ'=>'C', 'Ç'=>'C',
	        'È'=>'E', 'Ę'=>'E', 'É'=>'E', 'Ë'=>'E', 'Ê'=>'E',
	        'Ğ'=>'G',
	        'İ'=>'I', 'Ï'=>'I', 'Î'=>'I', 'Í'=>'I', 'Ì'=>'I',
	        'Ł'=>'L',
	        'Ñ'=>'N', 'Ń'=>'N',
	        'Ø'=>'O', 'Ó'=>'O', 'Ò'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'Oe',
	        'Ş'=>'S', 'Ś'=>'S', 'Ș'=>'S', 'Š'=>'S',
	        'Ț'=>'T',
	        'Ù'=>'U', 'Û'=>'U', 'Ú'=>'U', 'Ü'=>'Ue',
	        'Ý'=>'Y',
	        'Ź'=>'Z', 'Ž'=>'Z', 'Ż'=>'Z',
	        'â'=>'a', 'ǎ'=>'a', 'ą'=>'a', 'á'=>'a', 'ă'=>'a', 'ã'=>'a', 'Ǎ'=>'a', 'а'=>'a', 'А'=>'a', 'å'=>'a', 'à'=>'a', 'א'=>'a', 'Ǻ'=>'a', 'Ā'=>'a', 'ǻ'=>'a', 'ā'=>'a', 'ä'=>'ae', 'æ'=>'ae', 'Ǽ'=>'ae', 'ǽ'=>'ae',
	        'б'=>'b', 'ב'=>'b', 'Б'=>'b', 'þ'=>'b',
	        'ĉ'=>'c', 'Ĉ'=>'c', 'Ċ'=>'c', 'ć'=>'c', 'ç'=>'c', 'ц'=>'c', 'צ'=>'c', 'ċ'=>'c', 'Ц'=>'c', 'Č'=>'c', 'č'=>'c', 'Ч'=>'ch', 'ч'=>'ch',
	        'ד'=>'d', 'ď'=>'d', 'Đ'=>'d', 'Ď'=>'d', 'đ'=>'d', 'д'=>'d', 'Д'=>'D', 'ð'=>'d',
	        'є'=>'e', 'ע'=>'e', 'е'=>'e', 'Е'=>'e', 'Ə'=>'e', 'ę'=>'e', 'ĕ'=>'e', 'ē'=>'e', 'Ē'=>'e', 'Ė'=>'e', 'ė'=>'e', 'ě'=>'e', 'Ě'=>'e', 'Є'=>'e', 'Ĕ'=>'e', 'ê'=>'e', 'ə'=>'e', 'è'=>'e', 'ë'=>'e', 'é'=>'e',
	        'ф'=>'f', 'ƒ'=>'f', 'Ф'=>'f',
	        'ġ'=>'g', 'Ģ'=>'g', 'Ġ'=>'g', 'Ĝ'=>'g', 'Г'=>'g', 'г'=>'g', 'ĝ'=>'g', 'ğ'=>'g', 'ג'=>'g', 'Ґ'=>'g', 'ґ'=>'g', 'ģ'=>'g',
	        'ח'=>'h', 'ħ'=>'h', 'Х'=>'h', 'Ħ'=>'h', 'Ĥ'=>'h', 'ĥ'=>'h', 'х'=>'h', 'ה'=>'h',
	        'î'=>'i', 'ï'=>'i', 'í'=>'i', 'ì'=>'i', 'į'=>'i', 'ĭ'=>'i', 'ı'=>'i', 'Ĭ'=>'i', 'И'=>'i', 'ĩ'=>'i', 'ǐ'=>'i', 'Ĩ'=>'i', 'Ǐ'=>'i', 'и'=>'i', 'Į'=>'i', 'י'=>'i', 'Ї'=>'i', 'Ī'=>'i', 'І'=>'i', 'ї'=>'i', 'і'=>'i', 'ī'=>'i', 'ĳ'=>'ij', 'Ĳ'=>'ij',
	        'й'=>'j', 'Й'=>'j', 'Ĵ'=>'j', 'ĵ'=>'j', 'я'=>'ja', 'Я'=>'ja', 'Э'=>'je', 'э'=>'je', 'ё'=>'jo', 'Ё'=>'jo', 'ю'=>'ju', 'Ю'=>'ju',
	        'ĸ'=>'k', 'כ'=>'k', 'Ķ'=>'k', 'К'=>'k', 'к'=>'k', 'ķ'=>'k', 'ך'=>'k',
	        'Ŀ'=>'l', 'ŀ'=>'l', 'Л'=>'l', 'ł'=>'l', 'ļ'=>'l', 'ĺ'=>'l', 'Ĺ'=>'l', 'Ļ'=>'l', 'л'=>'l', 'Ľ'=>'l', 'ľ'=>'l', 'ל'=>'l',
	        'מ'=>'m', 'М'=>'m', 'ם'=>'m', 'м'=>'m',
	        'ñ'=>'n', 'н'=>'n', 'Ņ'=>'n', 'ן'=>'n', 'ŋ'=>'n', 'נ'=>'n', 'Н'=>'n', 'ń'=>'n', 'Ŋ'=>'n', 'ņ'=>'n', 'ŉ'=>'n', 'Ň'=>'n', 'ň'=>'n',
	        'о'=>'o', 'О'=>'o', 'ő'=>'o', 'õ'=>'o', 'ô'=>'o', 'Ő'=>'o', 'ŏ'=>'o', 'Ŏ'=>'o', 'Ō'=>'o', 'ō'=>'o', 'ø'=>'o', 'ǿ'=>'o', 'ǒ'=>'o', 'ò'=>'o', 'Ǿ'=>'o', 'Ǒ'=>'o', 'ơ'=>'o', 'ó'=>'o', 'Ơ'=>'o', 'œ'=>'oe', 'Œ'=>'oe', 'ö'=>'oe',
	        'פ'=>'p', 'ף'=>'p', 'п'=>'p', 'П'=>'p',
	        'ק'=>'q',
	        'ŕ'=>'r', 'ř'=>'r', 'Ř'=>'r', 'ŗ'=>'r', 'Ŗ'=>'r', 'ר'=>'r', 'Ŕ'=>'r', 'Р'=>'r', 'р'=>'r',
	        'ș'=>'s', 'с'=>'s', 'Ŝ'=>'s', 'š'=>'s', 'ś'=>'s', 'ס'=>'s', 'ş'=>'s', 'С'=>'s', 'ŝ'=>'s', 'Щ'=>'sch', 'щ'=>'sch', 'ш'=>'sh', 'Ш'=>'sh', 'ß'=>'ss',
	        'т'=>'t', 'ט'=>'t', 'ŧ'=>'t', 'ת'=>'t', 'ť'=>'t', 'ţ'=>'t', 'Ţ'=>'t', 'Т'=>'t', 'ț'=>'t', 'Ŧ'=>'t', 'Ť'=>'t', '™'=>'tm',
	        'ū'=>'u', 'у'=>'u', 'Ũ'=>'u', 'ũ'=>'u', 'Ư'=>'u', 'ư'=>'u', 'Ū'=>'u', 'Ǔ'=>'u', 'ų'=>'u', 'Ų'=>'u', 'ŭ'=>'u', 'Ŭ'=>'u', 'Ů'=>'u', 'ů'=>'u', 'ű'=>'u', 'Ű'=>'u', 'Ǖ'=>'u', 'ǔ'=>'u', 'Ǜ'=>'u', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'У'=>'u', 'ǚ'=>'u', 'ǜ'=>'u', 'Ǚ'=>'u', 'Ǘ'=>'u', 'ǖ'=>'u', 'ǘ'=>'u', 'ü'=>'ue',
	        'в'=>'v', 'ו'=>'v', 'В'=>'v',
	        'ש'=>'w', 'ŵ'=>'w', 'Ŵ'=>'w',
	        'ы'=>'y', 'ŷ'=>'y', 'ý'=>'y', 'ÿ'=>'y', 'Ÿ'=>'y', 'Ŷ'=>'y',
	        'Ы'=>'y', 'ž'=>'z', 'З'=>'z', 'з'=>'z', 'ź'=>'z', 'ז'=>'z', 'ż'=>'z', 'ſ'=>'z', 'Ж'=>'zh', 'ж'=>'zh'
	    );
	    return strtr($s, $replace);
	}
}

?>