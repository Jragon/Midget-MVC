<?php

class Route {
	// sets the config variable, which will be passed to the controller
	function __construct($config){
		$this->config = $config;

		$this->load = new Load($config);
	}

	public function load(){
		if($request = $this->requestInfo())
			if($this->load->controller($request['controller'], $request['method'], $request['arguments']))
				return true;
			else
				return false;
		else
			$this->load->controller($this->config['default_controller'], 'index');
	}

	private function requestInfo(){
		if(isset($_SERVER['PATH_INFO'])){
			$route = explode('/', substr($_SERVER['PATH_INFO'], 1));

			if(!empty($route[1])){
				$request = array();
				$request['controller'] = ucfirst(strtolower($route[0]));
				$request['method'] = !empty($route[1]) ? strtolower($route[1]) : 'index';
				$request['path'] = APPPATH . "controllers/" . $route[0] . ".php";
				$request['arguments'] = array();

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
}