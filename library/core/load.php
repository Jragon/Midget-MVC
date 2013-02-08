<?
class Load{

    static $instance = null;

	function __construct(){
		$this->config = Config::getConfig();
	}

    public static function getInstance() {
        if (self::$instance == null)
            self::$instance = new Load();
       
        return self::$instance;
    }

	// loads a specified model
	public function model($model){
		$path = APPPATH . "models/" . strtolower($model) . ".php";
		$modelClass = ucfirst($model . '_model');

		if($this->includePath($path))
			return new $modelClass();
	}

	public function library($library){
		$path = LIBRARY . "user/" . strtolower($library) . ".php";

		return $this->includePath($path);
	}

	public function controller($controller, $method, $arguments = FALSE){
		$path = APPPATH . "controllers/" . strtolower($controller) . ".php";
		$controller = ucfirst($controller);

		if($this->includePath($path)){
			$controller = new $controller();

			if($arguments)
				call_user_func_array(array($controller, $method), $arguments);
			else
				$controller->$method();
		}		

		var_dump($arguments);
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