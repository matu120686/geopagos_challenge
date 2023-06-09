<?php

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
