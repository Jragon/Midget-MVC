<?php

class Route {
	// sets the config variable, which will be passed to the controller
	function __construct(&$config){
		$this->config = $config;
	}

	public function load(){
		if($request = $this->requestInfo()){
			if($this->checkPath($request['path'])){
				$controller = new $request['controller']($this->config);

				if($request['method'] != 'index')
					call_user_func_array(array($controller, $request['method']), $request['arguments']);
				else
					$controller->index();
			}else{
				return false;
			}
		}else{
			$controller = $this->config['deafult_controller'];
			require APPPATH . "controllers/" . $controller . ".php";
			$controller = ucfirst($controller);
			$controller = new $controller($this->config);
			$method = 'index';
			$controller->$method();
		}
	}

	private function requestInfo(){
		if(isset($_SERVER['PATH_INFO'])){
			$route = explode('/', substr($_SERVER['PATH_INFO'], 1));

			if(!empty($route[1])){
				$request = array();
				$request['controller'] = ucfirst(strtolower($route[0]));
				$request['method'] = !empty($route[1]) ? strtolower($route[1]) : 'index';
				$request['path'] = APPPATH . "controllers/" . $route[0] . ".php";

				$i = 0;
				foreach($route as $vars){
					if ($i >= 2)
						$route['arguments'][] = $route[$i];
					$i++;
				}				

				return $request;
			}else
				return false;
		}else
			return false;
	}

	private function checkPath($path){
		// not sure how to check this
		if(file_exists($path) && preg_match("/" , APPPATH . "/i", realpath($path)))
			return true;

		return false;
	}
}