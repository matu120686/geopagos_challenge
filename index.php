<?php

require_once 'Jugador.php';
require_once 'Enfrentamiento.php';
require_once 'Torneo.php';
require_once 'vendor/autoload.php';
// Ejemplo de uso
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

$torneo = new Torneo($jugadores);
$ganador = $torneo->simularTorneo();

echo "El ganador del torneo es: " . $ganador->nombre;
