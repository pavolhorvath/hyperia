<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type');
header('Access-Control-Allow-Headers: Set-Cookie');

session_start();

require_once __DIR__ . '/../system/autoload.php';

$response = Router()
	->setRouteMethodes()
	->setRequestMethod()
	->setRequestUri()
	->route();

echo $response;