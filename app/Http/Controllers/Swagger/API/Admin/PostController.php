<?php

namespace App\Http\Controllers\Swagger\API\Admin;

use App\Http\Controllers\Controller;


//

/**
 *
 *
 *  @OA\Put(
 *      path="/api/admin/posts/{post}/active",
 *      summary="Изменение активности поста",
 *      tags={"Admin/Post"},
 *      security={{ "bearerAuth": {} }},
 *      @OA\Parameter(
 *          name="post",
 *          in="path",
 *          required=true,
 *          description="Slug поста",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(
 *                  property="active",
 *                  type="boolean",
 *                  description="Статус активности поста",
 *                  example=true
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Успешное изменение статуса активности",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(
 *                  property="status",
 *                  type="string",
 *                  example="success"
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response=400,
 *          description="Неверные данные для изменения статуса активности",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(
 *                  property="status",
 *                  type="string",
 *                  example="error"
 *              ),
 *              @OA\Property(
 *                  property="message",
 *                  type="string",
 *                  example="Invalid active data"
 *              )
 *          )
 *      )
 *  )
 *
 *
 *
 *
 *
 * @OA\Put(
 *     path="/api/admin/posts/sort",
 *     summary="Изменение очерёдности постов через SortableJs",
 *     tags={"Admin/Post"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 type="object",
 *                 @OA\Property(
 *                     property="order",
 *                     type="array",
 *                     description="Массив объектов, представляющий порядок постов",
 *                     @OA\Items(
 *                         type="object",
 *                         @OA\Property(
 *                             property="id",
 *                             type="string",
 *                             description="ID поста",
 *                             example="sluug1"
 *                         ),
 *                         @OA\Property(
 *                             property="position",
 *                             type="integer",
 *                             description="Новая позиция поста",
 *                             example=0
 *                         )
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
 * )
 *

 *
 * )
 */

//  api/admin/posts
class PostController extends Controller{

}

