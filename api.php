<?php
# load bootstrap
require __DIR__ . "/bootstrap/bootstrap.php";
$path = explode('/', @$_SERVER['PATH_INFO']);
require_once(PROJECT_ROOT_PATH . '/modules/news/controller/v1/News_controller.php');
$controller = $path[1].'_controller';

function return_404() {
	header("HTTP/1.1 404 Not Found");
    exit();
}


if (class_exists($controller)) {
	$ctr = new $controller();
	$strMethodName = $path[2];

	if (method_exists($ctr, $strMethodName)) {
		return $ctr->{$strMethodName}();
	}
} 

return_404();