<?php

if ((!isset($_GET['controller'])) || (!isset($_GET['action']))) {
	echo "Error";
}

$controller = $_GET['controller']."Controller";

require 'app/controller/'.$controller.'.php';

$action = $_GET['action'];

$objeto = new $controller();

$objeto->{$action}();

?>