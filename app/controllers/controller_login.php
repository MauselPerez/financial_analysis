<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once '../config/database.php';
require_once '../models/users.php';

$objUser = new Users($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $objUser->get_user_by_username($_POST['user']);

    if ($user) 
    {
        if ($user['password'] === sha1($_POST['password'])) 
        {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user'] = $user['user'];
            $_SESSION['name'] = $user['first_name'].' '.$user['last_name'];

            header('Location: ../views/index.php');
            exit();
        } 
        else 
        {
            //Regresar al login
            header('Location: ../../public/login.php?error=incorrect_password');
            exit();
        }
    } 
    else 
    {
        //Regresar al login
        header('Location: ../../public/login.php?error=user_not_found');
        exit();
    }

}
else
{
    header('Location: ../../public/login.php');
    exit();
}
?>