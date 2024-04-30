<?php
    // Iniciar sesión
    session_start();

    // Manejo de la solicitud
    $requestURI = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $segments = explode('/', $requestURI);
    $controller = isset($segments[1]) ? $segments[1] : '';
    $action = isset($segments[2]) ? $segments[2] : '';
    $param = isset($segments[3]) ? $segments[3] : '';

    if(!isset($_SESSION['user_id']) && $controller != 'login')
    {
        header('Location: ../'.$controller.'/public/login.php');
        exit();
    }
    else if(isset($_SESSION['user_id']))
    {
        header('Location: ../'.$controller.'/app/views/index.php');
        exit();
    }



?>