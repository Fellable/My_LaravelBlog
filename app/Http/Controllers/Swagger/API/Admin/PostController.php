<?php

namespace App\Http\Controllers\Swagger\API\Admin;

use App\Http\Controllers\Controller;




/**
 * @OA\Get
 * (
 *     path="/api/admin/posts",
 *     summary="Получение всех постов из админки",
 *     tags={"Admin/Post"},
 *     security={{ "bearerAuth": {} }},
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
 ** @OA\Post(
 *     path="/api/admin/posts",
 *     summary="Изменение очерёдности постов через SortableJs",
 *     tags={"Admin/Post"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 type="array",
 *                 description="Массив объектов, представляющий порядок постов",
 *                 @OA\Items(
 *                     type="object",
 *                     @OA\Property(
 *                         property="id",
 *                         type="integer",
 *                         description="ID поста",
 *                         example=54
 *                     ),
 *                     @OA\Property(
 *                         property="position",
 *                         type="integer",
 *                         description="Позиция поста",
 *                         example=0
 *                     )
 *                 )
 *             )
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Успешный ответ",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="status",
 *                 type="string",
 *                 example="success",
 *                 description="Статус выполнения запроса"
 *             )
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=400,
 *         description="Некорректные данные",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(
 *                 property="status",
 *                 type="string",
 *                 example="error",
 *                 description="Статус выполнения запроса"
 *             ),
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 example="Invalid input data",
 *                 description="Сообщение об ошибке"
 *             )
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=500,
 *         description="Ошибка сервера"
 *     ),
 *

 *
 * )
 */

//  api/admin/posts
class PostController extends Controller{

}

