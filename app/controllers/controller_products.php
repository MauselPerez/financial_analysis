<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once '../config/database.php';
require_once '../models/products.php';

$objProducts = new Products($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    if (isset($_GET['action'])) 
    {   
        $action = $_GET['action'];

        switch ($action) 
        {
            case 'createProduct':
                if (isset($_POST['txt_name'])) 
                {
                    $objProducts->create_product($_POST['txt_name']);
                    header('Location: ../../app/views/create_products.php?success=product_created');
                    exit();
                }
                else
                {
                    header('Location: ../../app/views/create_products.php?error=missing_data');
                    exit();
                }

        }
    }
}
?>