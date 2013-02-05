<?php

class Model{
	function __construct($config, $load){
		$this->config = $config;
		$this->load = $load;

		if($config['database']['connect']){
			try{
				$this->db = new PDO(
					$config['database']['driver'] . ":host=" . $config['database']['host'] . ";" . "dbname=" . $config['database']['dbname'], 
					$config['database']['username'], 
					$config['database']['password']);			
			}catch(PDOException $error){
				echo 'Error connecting to the database <br />';
				echo $error->getMessage();
				die();
			}
		}
	}
}