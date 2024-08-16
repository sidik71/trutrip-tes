<?php

namespace App\Swagger\V1\Trip;

/**
 *
 * @OA\Get(
 * path="/trip-list",
 * tags={"Trip Management"},
 *     @OA\Parameter(
 *         name="search",
 *         in="query",
 *         description="Search of results",
 *         required=false,
 *         @OA\Schema(
 *             type="string",
 *             example=""
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="limit",
 *         in="query",
 *         description="Limit the number of results",
 *         required=false,
 *         @OA\Schema(
 *             type="integer",
 *             example=10
 *         )
 *     ),
 *     @OA\Parameter(
 *         name="page",
 *         in="query",
 *         description="Page the number of results",
 *         required=false,
 *         @OA\Schema(
 *             type="integer",
 *             example=1
 *         )
 *     ),
 * security={{"bearerAuth":{}}},
 * @OA\Response(response=200, description="return Otp Model", @OA\JsonContent()),
 * )
 */

class TripListControllerIndexSwagger
{
}
