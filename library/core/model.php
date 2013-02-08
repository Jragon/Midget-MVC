<?php

class Model{
	function __construct(){
		$this->config = Config::getConfig();
		$this->load = Load::getInstance();

		if($this->config['database']['connect']){
			try{
				$this->db = new PDO(
					$this->config['database']['driver'] . ":host=" . $this->config['database']['host'] . ";" . "dbname=" . $this->config['database']['dbname'], 
					$this->config['database']['username'], 
					$this->config['database']['password']);			
			}catch(PDOException $error){
				echo 'Error connecting to the database <br />';
				echo $error->getMessage();
				die();
			}
		}
	}
}