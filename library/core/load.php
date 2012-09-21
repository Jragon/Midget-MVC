<?php

class Load{
	function __construct($controller){
		$this->controller = $controller;
	}

	// loads a specified model
	public function model($model){
		$model = strtolower($model);
		if(file_exists(APPPATH . "models/$model.php")){
			require(APPPATH . "models/$model.php");
			$modelclass = ucfirst($model . '_Model');
			// call function to include it in the controller
			$this->controller->$model = new $modelclass;
		}
	}

	// loads a veiw
	public function view($view, $data){
		// asign filepath
		$path = APPPATH . "views/" . $view . ".php";
		// asign variables
		foreach($data as $var => $value){
			$$var = $value;
		}
		
		if(file_exists($path)){
			ob_start();
			require($path);
			print(ob_get_clean());
		}else
			return false;
	}
}