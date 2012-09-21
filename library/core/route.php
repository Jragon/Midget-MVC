<?php

class Route {
	public function load(){
		global $config;
		if(isset($_SERVER['PATH_INFO'])){
			$route = explode('/', substr($_SERVER['PATH_INFO'], 1));
			$controller = ucfirst($route[0]);
			$method = strtolower($route[1]);

			require APPPATH . "controllers/" . $route[0] . ".php";
			$variables = array();
			$controller = new $controller;
			$i = 0;

			foreach($route as $vars){
				if ($i >= 2)
					$variables[] = $route[$i];
				$i++;
			}

			call_user_func_array(array($controller, $method), $variables);
		}else{
			$controller = $config['deafult_controller'];
			require APPPATH . "controllers/" . $controller . ".php";
			$controller = ucfirst($controller);
			$controller = new $controller;
			$method = 'index';
			$controller->$method();
		}
	}
}