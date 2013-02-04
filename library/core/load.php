<?php

class Load{

	function __construct($config){
		$this->config = $config;
	}

	// loads a specified model
	public function model($model){
		$path = APPPATH . "models" . strtolower($model) . ".php"

		if($this->checkPath($path)){
			require($path);
			$modelclass = ucfirst($model . '_Model');

			// call function to include it in the controller
			return new $modelclass($this->config);
		}
	}

	public function library($library){
		$path = LIBRARY . "user/" . strtolower($library) . ".php"

		if($this->checkPath($path)){
			require($path);
			$libraryclass = ucfirst($library . '_library');

			// call function to include it in the controller
			return new $libraryclass($this->config);
		}
	}

	private function checkPath($path){
		if(file_exists($path) && preg_match("/" , APPPATH . "/i", realpath($path)))
			return true;

		return false;
	}
}