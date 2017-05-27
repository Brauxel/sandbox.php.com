<?php
	interface IsQualified {
		public function hasMasters();
	}

	interface Encrypt {
		public function encrypter();
	}

	//use App\User;
	//use App\Manager;

	class User implements IsQualified {
		protected $name;
		protected $age;
		protected $degree;
		protected $shortlisted;

		public function __construct($name, $age, $degree) {
			$this->name = $name;
			$this->age = $age;
			$this->degree = $degree;
			//$this->details();
		}

		public function hasMasters() {
			if ( stripos($this->degree, 'Master') > -1 ) {
				$this->shortlisted = 'YES';
			} else {
				$this->shortlisted = 'NO';
			}

			return $this->shortlisted;
		}

		public function details() {
			return $this->hasMasters();
		}
	}

	class Manager extends User implements Encrypt {
		protected $position;
		private $password;

		public function __construct($name, $age, $degree, $position, $password) {
			$this->name = $name;
			$this->age = $age;
			$this->degree = $degree;
			$this->position = $position;
			$this->password = $password;
			$this->encrypter();
		}

		public function encrypter() {
			$this->password = md5($this->password);
		}

		public function get() {
			return $this->password;
		}
	}
?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>PHP Sandbox</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.2.0/normalize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
        <!--<link rel="stylesheet" href="css/main.css"> -->
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <main style="color: #000;">
        	<?php 
        		$test = new User('aakash', 29, 'masters'); 
        		echo $test->details();

        		$hrManager = new Manager('Alex', 45, 'Masters of Administration', 'HR Manager', 'password');
        		echo $hrManager->get();
        	?>

<?php
$html = file_get_contents('https://www.punters.com.au/'); //get the html returned from the following url

$pokemon_doc = new DOMDocument();

libxml_use_internal_errors(TRUE); //disable libxml errors

if(!empty($html)){ //if any html is actually returned

	$pokemon_doc->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html
	
	$pokemon_xpath = new DOMXPath($pokemon_doc);

	//get all the h2's with an id
	$pokemon_row = $pokemon_xpath->query('//span[@class="forum-discussion__post-count"]');

	var_dump($pokemon_row);

	if($pokemon_row->length > 0){
		foreach($pokemon_row as $row){
			echo $row->nodeValue . "<br/>";
		}
	}
}
?>        	
        </main>

        <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.4.min.js"><\/script>')</script>

    </body>
</html>