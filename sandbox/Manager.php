<?php
	namespace App;

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