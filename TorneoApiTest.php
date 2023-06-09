<?php

require_once 'Jugador.php';
require_once 'Enfrentamiento.php';
require_once 'Torneo.php';

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;



class TorneoApiTest extends TestCase
{
    private $client;

    protected function setUp(): void
    {
        $this->client = new Client([
            'base_uri' => 'http://geopagoschallenge.des',
        ]);
    }

    public function testSimularTorneo()
    {
        $jugadores = [
            [
                'nombre' => 'Jugador 1',
                'nivelHabilidad' => 80,
                'suerte' => 10,
            ],
        ];

        $response = $this->client->request('POST', '/api/torneo', [
            'json' => $jugadores,
        ]);

        $data = json_decode($response->getBody(), true);

        $this->assertEquals(200, $response->getStatusCode());
        //  mostrar la salida

        $this->assertArrayHasKey('ganador', $data, 'La clave "nombre" no está presente en el array.');

        $ganador = $data['ganador'] ?? null;

        $this->assertNotEmpty($ganador, 'El nombre del ganador está vacío.');
        echo "El ganador del torneo es: " . $ganador;
    }
}
