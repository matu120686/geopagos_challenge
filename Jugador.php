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
