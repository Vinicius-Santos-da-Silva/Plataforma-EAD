<?php

class controller {

	public function __construct() {}

	public function debug($obj,$die=false){
		print_r($obj);echo PHP_EOL;

		if ($die) {
			die();
		}
	} 

	public function loadView($viewName, $viewData = array()) {
		extract($viewData);
		require 'views/'.$viewName.'.php';
	}

	public function loadTemplate($viewName, $viewData = array()) {
		require 'views/template.php';
	}

	public function loadViewInTemplate($viewName, $viewData = array()) {
		extract($viewData);
		require 'views/'.$viewName.'.php';
	}

}