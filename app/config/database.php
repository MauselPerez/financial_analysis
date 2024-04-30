<?php
    // Configuración de la base de datos
    $dbHost = 'localhost';     // Host de la base de datos
    $dbName = 'financial_analysis'; // Nombre de la base de datos
    $dbUsername = 'root';   // Nombre de usuario de la base de datos
    $dbPassword = 'Gt4s.frc-kvCOl221337fc'; // Contraseña de la base de datos

    // Intentar establecer una conexión a la base de datos usando PDO
    try {
        $conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
        // Habilitar el modo de errores de PDO
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        // En caso de error, mostrar un mensaje de error y detener la ejecución del script
        die("Error al conectar con la base de datos: " . $e->getMessage());
    }
?>
