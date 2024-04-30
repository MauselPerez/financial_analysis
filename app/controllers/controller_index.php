<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once '../config/database.php';  
require_once '../models/report.php';

$report = new Report($conn);

// Si se envió un ID de producto, obtener los datos del producto seleccionado
if (isset($_GET['productId'])) {
    $productId = $_GET['productId'];
    
    // Obtener los datos del informe para el producto seleccionado
    $reportData = $report->get_report_by_product($productId);
    
    // Procesar los datos para prepararlos para el gráfico
    $chartData = [];
    
    // Obtener el nombre del producto
    $productName = $report->get_product_name($productId);

    foreach ($reportData as $row) {
        $year = $row['year'];
        $price = (int) $row['total_price'];
        
        // Agregar los datos al array de datos del gráfico
        $chartData['data'][] = ['year' => $year, 'price' => $price];
    }

    // Devolver los datos del gráfico y el nombre del producto como JSON
    header('Content-Type: application/json');
    echo json_encode(['product' => $productName, 'data' => $chartData]);
    exit();
}

// Si no se envió un ID de producto, obtener todos los productos para llenar el select
$reportData = $report->get_report();

// Procesar los datos para prepararlos para el select
$productOptions = [];

foreach ($reportData as $row) {
    $productId = $row['product_id'];
    $productName = $row['product'];
    
    // Agregar la opción del producto al array
    $productOptions[$productId] = [
        'product' => $productName
    ];
}

// Devolver las opciones del select como JSON
header('Content-Type: application/json');
echo json_encode($productOptions);
exit();
?>
