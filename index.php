<?php

class Jugador {
    public $nombre;
    public $nivelHabilidad;
    public $suerte;

    public function __construct($nombre, $nivelHabilidad, $suerte) {
        $this->nombre = $nombre;
        $this->nivelHabilidad = $nivelHabilidad;
        $this->suerte = $suerte;
    }
}

class Enfrentamiento {
    public $jugador1;
    public $jugador2;

    public function __construct($jugador1, $jugador2) {
        $this->jugador1 = $jugador1;
        $this->jugador2 = $jugador2;
    }

    public function determinarGanador() {
        $puntuacionJugador1 = $this->jugador1->nivelHabilidad + $this->jugador1->suerte;
        $puntuacionJugador2 = $this->jugador2->nivelHabilidad + $this->jugador2->suerte;

        if ($puntuacionJugador1 > $puntuacionJugador2) {
            return $this->jugador1;
        } else {
            return $this->jugador2;
        }
    }
}

class Torneo {
    public $jugadores;

    public function __construct($jugadores) {
        $this->jugadores = $jugadores;
    }

    public function simularTorneo() {
        $rondaActual = $this->jugadores;

        while (count($rondaActual) > 1) {
            $rondaSiguiente = array();
            $numEnfrentamientos = count($rondaActual) / 2;

            for ($i = 0; $i < $numEnfrentamientos; $i++) {
                $jugador1 = array_shift($rondaActual);
                $jugador2 = array_shift($rondaActual);
                $enfrentamiento = new Enfrentamiento($jugador1, $jugador2);
                $ganador = $enfrentamiento->determinarGanador();
                $rondaSiguiente[] = $ganador;
            }

            $rondaActual = $rondaSiguiente;
        }

        return $rondaActual[0];
    }
}

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

 echo "El ganador del torneo es: " . $ganador->nombre . "\n";