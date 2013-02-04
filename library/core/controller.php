<?php
class Controller{
	function __construct($config, $load){
		$this->config = $config;

		$this->load = $load;
		$this->view = new View();
	}
}