<?php

namespace App\Swagger\V1\Auth;

/**
 *
 * @OA\Post(
 * path="/register",
 * tags={"Authentication"},
 * @OA\RequestBody( @OA\MediaType( mediaType="application/x-www-form-urlencoded", @OA\Schema(
                
 *      @OA\Property(
 *          property="name",
 *          example = ""
 *      ),      
 *      @OA\Property(
 *          property="email",
 *          example = ""
 *      ),      
 *      @OA\Property(
 *          property="password",
 *          example = ""
 *      ),      
 *      @OA\Property(
 *          property="password_confirmation",
 *          example = ""
 *      ),
 * ))),
 * @OA\Response(response=200, description="return Otp Model", @OA\JsonContent()),
 * )
 */

class AuthControllerRegistrationSwagger
{
}
