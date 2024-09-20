<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * * @OA\Post(
 *      path="/api/auth/login",
 *      summary="Получение JWT-токена",
 *      tags={"User"},
 *
 *      @OA\RequestBody(
 *          @OA\JsonContent(
 *              allOf={
 *                  @OA\Schema(
 *                          @OA\Property (property="email", type="string", example="you@email.ru"),
 *                          @OA\Property (property="password", type="string", example="you@email.ru"),
 *                      )
 *              }
 *          )
 *      ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="access_token", type="string", example="token"),
 *             @OA\Property(property="token_type", type="string", example="berrer"),
 *             @OA\Property(property="expires_in", type="integer", example=3500),
 *         )
 *     ),
 *

 *     @OA\Response(
 *         response=401,
 *         description="Некорректные данные",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="error",
 *                 type="string",
 *                 example="Unauthorized",
 *                 description="Статус выполнения запроса"
 *             ),
 *         )
 *        ),
 *       @OA\Response(
 *           response=500,
 *           description="Ошибка сервера"
 *       ),
 *
 * )
 *
 */
class UserController extends Controller
{
    //
}
