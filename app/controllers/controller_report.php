<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once '../config/database.php';
require_once '../models/products.php';
require_once '../models/report.php';

$products = new Products($conn);
$report = new Report($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'createReport') 
{
    if (isset($_POST['product']) && isset($_POST['price']) && isset($_POST['year'])) 
    {
        $product = $_POST['product'];
        $price = $_POST['price'];
        $year = $_POST['year'];

        $report->create_report($product, $price, $year);
        
        header('Location: ../views/index.php?report_created=report_created');
        exit();
    } 
    else
    {
        header('Location: ../views/create_report.php');
        exit();
    }
} 
elseif ($_SERVER['REQUEST_METHOD'] === 'GET') 
{
    $productList = $products->get_products();

    $productArray = $productList->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($productArray);
    exit();
} 
else 
{
    http_response_code(403);
    echo json_encode(array("message" => "Acceso denegado."));
    exit();
}
?>

