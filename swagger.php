<?php

require_once 'Jugador.php';
require_once 'Enfrentamiento.php';
require_once 'Torneo.php';

use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     title="API del Torneo de Jugadores",
 *     version="1.0.0",
 *     description="API para simular un torneo de jugadores"
 * )
 */

/**
 * @OA\Schema(
 *     schema="Jugador",
 *     required={"nombre", "nivelHabilidad", "suerte"},
 *     @OA\Property(property="nombre", type="string"),
 *     @OA\Property(property="nivelHabilidad", type="integer"),
 *     @OA\Property(property="suerte", type="integer")
 * )
 */

/**
 * @OA\Schema(
 *     schema="Ganador",
 *     required={"nombre"},
 *     @OA\Property(property="nombre", type="string")
 * )
 */

/**
 * @OA\Post(
 *     path="/api/torneo",
 *     tags={"Torneo"},
 *     summary="Simula el torneo y determina al ganador",
 *     @OA\RequestBody(
 *         description="Lista de jugadores",
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 type="array",
 *                 @OA\Items(ref="#/components/schemas/Jugador")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response="200",
 *         description="Ganador del torneo",
 *         @OA\JsonContent(ref="#/components/schemas/Ganador")
 *     )
 * )
 */

?>
