<?php

class Load{

	// loads a specified model
	public function model($model){
		$model = strtolower($model);
		if(file_exists(APPPATH . "models/$model.php")){
			require(APPPATH . "models/$model.php");
			$modelclass = ucfirst($model . '_Model');
			// call function to include it in the controller
			return new $modelclass;
		}
	}

	public function library($library){
		$library = strtolower($library);
		if(file_exists(LIBRARY . "$library.php")){
			require(LIBRARY . "$library.php");
			$libraryclass = ucfirst($library);

			return new $libraryclass;
		}
	}
}