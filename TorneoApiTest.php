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
            'base_uri' => 'http://localhost',
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
        $this->assertArrayHasKey('nombre', $data);
        $this->assertNotEmpty($data['nombre']);
    }
}
