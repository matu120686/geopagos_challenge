<?php

use PHPUnit\Framework\TestCase;

require_once 'Jugador.php';
require_once 'Enfrentamiento.php';
require_once 'Torneo.php';

class TorneoTest extends TestCase {
    public function testSimularTorneo() {
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

        $this->assertInstanceOf(Jugador::class, $ganador);
        $this->assertContains($ganador, $jugadores);
    }
}
