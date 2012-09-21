<?php

// define paths
define('BASEPATH', dirname(dirname(__FILE__)) . '/');
define('APPPATH', BASEPATH . 'application/');
define('LIBRARY', BASEPATH . 'library/');

// inclue core files 
require APPPATH . "config/config.php";
require LIBRARY . "core/core.php";