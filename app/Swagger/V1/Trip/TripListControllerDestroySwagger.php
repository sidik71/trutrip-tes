<?php

namespace App\Swagger\V1\Trip;

/**
 *
 * @OA\Delete(
 * path="/trip-list-delete/{id}",
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

class TripListControllerDestroySwagger
{
}
