<?php

// start sessions if need be
if($config['session'])
	session_start();

// include core classes
require LIBRARY . "core/controller.php";
require LIBRARY . "core/model.php";
require LIBRARY . "core/route.php";
require LIBRARY . "core/load.php";
require LIBRARY . "core/view.php";

// lets route this bitch
$route = new Route;
$route->load();
