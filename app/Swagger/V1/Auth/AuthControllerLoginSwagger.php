<?php

namespace App\Swagger\V1\Auth;

/**
 *
 * @OA\Post(
 * path="/login",
 * tags={"Authentication"},
 * @OA\RequestBody( @OA\MediaType( mediaType="application/x-www-form-urlencoded", @OA\Schema(
                
 *      @OA\Property(
 *          property="email",
 *          example = ""
 *      ),      
 *      @OA\Property(
 *          property="password",
 *          example = ""
 *      ), 
 * ))),
 * security={{"bearerAuth":{}}},
 * @OA\Response(response=200, description="return Otp Model", @OA\JsonContent()),
 * )
 */

class AuthControllerLoginSwagger
{
}
