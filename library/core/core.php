<?php

//$config = Config::getConfig

// start sessions if need be
if(Config::getConfig()['session'])
	session_start();

define('ROOTURL', Config::getConfig()['web_url']);

// include other classes
require LIBRARY . "core/controller.php";
require LIBRARY . "core/model.php";
require LIBRARY . "core/route.php";
require LIBRARY . "core/load.php";
require LIBRARY . "core/view.php";

// lets route this bitch
$route = new Route();
$route->load();

