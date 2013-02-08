<?php
class Controller{
	function __construct(){
		$this->config = Config::getConfig();

		$this->load = Load::getInstance();
		$this->view = new View;
	}
}