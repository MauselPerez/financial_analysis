<?php
// Manejo de la solicitud
$requestURI = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', $requestURI);
$controller = $segments[1];
$action = $segments[2];
$param = $segments[3];




?>