<?php

namespace App\Swagger\V1\Trip;

/**
 *
 * @OA\Get(
 * path="/trip-list-detail/{id}",
 * tags={"Trip Management"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID of trip",
 *         required=false,
 *         @OA\Schema(
 *             type="integer",
 *             example=""
 *         )
 *     ),
 * security={{"bearerAuth":{}}},
 * @OA\Response(response=200, description="return Otp Model", @OA\JsonContent()),
 * )
 */

class TripListControllerShowSwagger
{
}
