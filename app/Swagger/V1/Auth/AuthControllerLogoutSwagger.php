<?php

namespace App\Swagger\V1\Auth;

/**
 *
 * @OA\Post(
 * path="/logout",
 * tags={"Authentication"},
 * security={{"bearerAuth":{}}},
 * @OA\Response(response=200, description="return Otp Model", @OA\JsonContent()),
 * )
 */

class AuthControllerLogoutSwagger
{
}
