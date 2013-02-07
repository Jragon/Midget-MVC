<?
class Load{

	function __construct($config){
		$this->config = $config;
	}

	// loads a specified model
	public function model($model){
		$path = APPPATH . "models/" . strtolower($model) . ".php";
		$modelClass = ucfirst($model . '_model');

		if($this->includePath($path))
			return new $modelClass($this->config, $this);
	}

	public function library($library, $config = false){
		$path = LIBRARY . "user/" . strtolower($library) . ".php";

		return $this->includePath($path);
	}

	public function controller($controller, $method, $arguments = false){
		$path = APPPATH . "controllers/" . strtolower($controller) . ".php";
		$controller = ucfirst($controller);

		if($this->includePath($path)){
			$controller = new $controller($this->config, $this);

			if($arguments)
				call_user_func_array(array($controller, $request['method']), $request['arguments']);
			else
				$controller->$method();
		}		
	}

	private function checkPath($path){
		if(file_exists($path) && preg_match('/' . preg_quote(BASEPATH, '/') . '/', realpath($path)))
			return true;

		return false;
	}

	private function includePath($path){
		if($this->checkPath($path))
			require($path);
		else
			return false;

		return true;
	}
}