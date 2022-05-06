<?php
# load bootstrap
require __DIR__ . "/bootstrap/bootstrap.php";
$path = explode('/', @$_SERVER['PATH_INFO']);

$controller = $path[1].'_controller';

function return_404() {
	header("HTTP/1.1 404 Not Found");
    exit();
}


if (class_exists($controller)) {
	$ctr = new $controller();
	$strMethodName = $path[2];

	if (method_exists($ctr, $strMethodName)) {
		if (isset($path[3]) && $path[3] != '') {
			return $ctr->{$strMethodName}($path[3]);
		} else {
			return $ctr->{$strMethodName}();
		}
	}
} 

return_404();