<?php

namespace App\Swagger\V1\Trip;

/**
 *
 * @OA\Put(
 * path="/trip-list-update/{id}",
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

 * @OA\RequestBody( @OA\MediaType( mediaType="application/x-www-form-urlencoded", @OA\Schema(       
 *      @OA\Property(
 *          property="title",
 *          example = ""
 *      ),
 *      @OA\Property(
 *          property="origin",
 *          example = ""
 *      ),
 *      @OA\Property(
 *          property="destination",
 *          example = ""
 *      ),
 *      @OA\Property(
 *          property="start_date",
 *          example = ""
 *      ),
 *      @OA\Property(
 *          property="end_date",
 *          example = ""
 *      ),
 *      @OA\Property(
 *          property="status",
 *          example = ""
 *      ),
 *      @OA\Property(
 *          property="description",
 *          example = ""
 *      ),
 * ))),
 * security={{"bearerAuth":{}}},
 * @OA\Response(response=200, description="return Otp Model", @OA\JsonContent()),
 * )
 */

class TripListControllerUpdateSwagger
{
}
