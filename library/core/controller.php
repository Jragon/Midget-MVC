<?php
class Controller{
	function __construct(){
		global $config;
		$this->load = new Load($this);
	}
}