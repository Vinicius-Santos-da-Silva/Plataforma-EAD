<?php
class model {

	protected $db;

	public function __construct() {
		global $db;
		$this->db = $db;
	}

	public function debug($obj,$die=false){
		print_r($obj);echo PHP_EOL;

		if ($die) {
			die();
		}
	} 
}