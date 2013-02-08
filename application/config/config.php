<?php

class Config{
	static $config = NULL;

	static function getConfig(){
		if(self::$config != NULL)
			return self::$config;

		$config = array();

		// Sessions?
		$config['session'] = true;

		// Set the deafult controller
		$config['default_controller'] = "welcome";

		// Set the web url
		$config['web_url'] = "http://example.tld";

		// Database settings
		$config['database']['connect']  = false;
		$config['database']['driver']   = "mysql";
		$config['database']['host']     = "localhost";
		$config['database']['dbname']   = "";
		$config['database']['username'] = "";
		$config['database']['password'] = "";

		self::$config = $config;

		return $config;
	}
}