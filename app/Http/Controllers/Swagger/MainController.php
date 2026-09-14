<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Info
 * (
 *     title="MyLaravelBlog Doc API",
 *     version="1.0.0"
 * ),
 *
 * @OA\PathItem
 * (
 *     path="/api"
 * )
 *
 * @OA\Components(
 *
 *     @OA\SecurityScheme(
 *         securityScheme="bearerAuth",
 *         type="http",
 *         scheme="bearer"
 *     )
 * )
 */
class MainController extends Controller
{
    //
}
