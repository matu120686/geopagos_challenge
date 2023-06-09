<?php

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
