<?php

class View{
	// loads a veiw
	public function render($view, $data = NULL){
		// asign filepath
		$path = APPPATH . "views/" . $view . ".php";
		// asign variables if $data is set
		if($data != NULL)
			extract($data);
		
		if(file_exists($path)){
			ob_start();
			include($path);

			print(ob_get_clean());
		}else
			return false;
	}
}