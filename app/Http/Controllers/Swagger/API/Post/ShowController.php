<?php

namespace App\Http\Controllers\Swagger\API\Post;

use App\Http\Controllers\Controller;

/**
 * @OA\Get(
 *     path="/api/post/{post}",
 *     summary="Показ одного поста",
 *     tags={"Post"},
 *     @OA\Parameter(
 *         name="post",
 *         in="path",
 *         required=true,
 *         description="Slug поста",
 *         @OA\Schema(
 *             type="string"
 *         )
 *     ),
 *     @OA\Response(
 *          response=200,
 *          description="Успешный ответ",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(
 *                  property="data",
 *                  type="object",
 *                  @OA\Property(property="id", type="integer", example=54),
 *                  @OA\Property(property="title", type="string", example="my s post w"),
 *                  @OA\Property(property="main_image", type="string", example="/tmp/phpUu9boR"),
 *                  @OA\Property(
 *                      property="images",
 *                      type="array",
 *                      @OA\Items(
 *                          type="object",
 *                          @OA\Property(property="id", type="integer", example=1),
 *                          @OA\Property(property="url", type="string", example="http://example.com/image1.jpg")
 *                      )
 *                  )
 *              )
 *          )
 *      ),
 *     @OA\Response(
 *         response=404,
 *         description="Пост не найден"
 *     )
 * )
 */
class ShowController extends Controller
{

}
