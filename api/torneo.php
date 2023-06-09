<?php

require_once '../Jugador.php';
require_once '../Enfrentamiento.php';
require_once '../Torneo.php';
require_once '../vendor/autoload.php';
// Verificar la ruta y el método de la solicitud

if ($_SERVER['REQUEST_URI'] === '/api/torneo') {
    // Crear los jugadores del torneo
    $jugadores = [
        new Jugador('Jugador 1', 80, 10),
        new Jugador('Jugador 2', 70, 5),
        new Jugador('Jugador 3', 90, 15),
        new Jugador('Jugador 4', 60, 20),
        new Jugador('Jugador 5', 85, 3),
        new Jugador('Jugador 6', 75, 7),
        new Jugador('Jugador 7', 95, 12),
        new Jugador('Jugador 8', 65, 8),
    ];

    // Crear una instancia del torneo
    $torneo = new Torneo($jugadores);

    // Simular el torneo y obtener el ganador
    $ganador = $torneo->simularTorneo();

    // Construir la respuesta JSON
    $response = [
        'ganador' => $ganador->nombre ?? "Prueba",
    ];

    // Configurar el encabezado de respuesta
    header('Content-Type: application/json');

    // Imprimir la respuesta en formato JSON
    echo json_encode($response);
    exit;
}

// Si la ruta no coincide con ninguna ruta de la API, devuelve un error
http_response_code(404);
echo json_encode(['error' => 'Ruta no encontrada']);
