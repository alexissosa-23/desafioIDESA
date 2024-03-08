<?php

require_once 'Database.php';

// Obtener el ID del lote enviado como argumento en la línea de comandos
$loteID = $argv[1] ?? null;

// Si no se proporcionó un ID de lote desde la línea de comandos, intenta obtenerlo de los parámetros de la URL
if ($loteID === null) {
    parse_str($_SERVER['QUERY_STRING'], $queryParams);
    $loteID = $queryParams['loteID'] ?? null;
}
if ($loteID !== null) {
    // Establecer la conexión con la base de datos
    Database::setDB();
    
    // Obtener la conexión
    $db = Database::getConnection();

    // Consulta SQL para obtener los datos del lote según el ID
    $stmt = $db->prepare("SELECT * FROM debts WHERE lote = :loteID");
    $stmt->bindValue(':loteID', $loteID, SQLITE3_TEXT);
    $result = $stmt->execute();

    // Almacenar los resultados en un array
    $lotes = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $lotes[] = $row;
    }

    // Devolver los datos como JSON
    header('Content-Type: application/json');
    echo json_encode($lotes);
} else {
    // Si no se proporcionó un ID de lote, devolver un error
    
    http_response_code(400);
    echo json_encode(['error' => 'Se debe proporcionar un ID de lote']);
}