<?php

namespace App\Http\Controllers\Swagger\API\Post;

use App\Http\Controllers\Controller;

/**
 * @OA\Get
 * (
 *     path="/api/post/{post}",
 *     summary="Показ одного поста",
 *     tags={"Post"},
 *
 *     @OA\RequestBody(
 *
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Ok"
 *     ),
 * ),
 *
 *
 */
class ShowController extends Controller
{

}
