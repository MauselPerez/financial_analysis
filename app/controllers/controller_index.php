<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once '../config/database.php';  
require_once '../models/report.php';

$report = new Report($conn);

// Obtener los datos de los informes
$reportData = $report->get_report();

// Procesar los datos para prepararlos para el gráfico
$chartData = [];

foreach ($reportData as $row) {
    $productId = $row['product_id'];
    $productName = $row['product'];
    $year = $row['year'];
    $price = (int) $row['total_price'];

    // Si el producto aún no existe en el array de datos del gráfico, inicialízalo
    if (!isset($chartData[$productId])) {
        $chartData[$productId] = [
            'product' => $productName,
            'data' => [] // Inicializar un array para los precios por año
        ];
    }

    // Agregar el precio al array de datos del año correspondiente
    $chartData[$productId]['data'][$year] = $price;
}

// Devolver los datos del gráfico como JSON
header('Content-Type: application/json');
echo json_encode($chartData);
exit();
?>
