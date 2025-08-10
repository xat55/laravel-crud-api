<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Posts",
 *     description="Операции с постами"
 * )
 */
class PostController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/posts",
     *     summary="Получить список постов",
     *     tags={"Posts"},
     *     @OA\Response(
     *         response=200,
     *         description="Успешный запрос",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Post")
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 example="This action is unauthorized."
     *             )
     *         )
     *     )
     * )
     */
    public function index()
    {
        // Документация для метода index()
    }

    /**
     * @OA\Post(
     *     path="/api/posts",
     *     summary="Создать новый пост",
     *     tags={"Posts"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"user_id", "body"},
     *             @OA\Property(property="user_id", type="integer", example=1),
     *             @OA\Property(property="body", type="string", example="Содержание поста")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Пост успешно создан",
     *         @OA\JsonContent(ref="#/components/schemas/Post")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Ошибка валидации"
     *     )
     * )
     */
    public function store()
    {
        // Документация для метода store()
    }

    /**
     * @OA\Get(
     *     path="/api/posts/{post}",
     *     summary="Получить пост по ID",
     *     tags={"Posts"},
     *     @OA\Parameter(
     *         name="post",
     *         in="path",
     *         required=true,
     *         description="ID поста",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Успешный запрос",
     *         @OA\JsonContent(ref="#/components/schemas/Post")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Пост не найден"
     *     )
     * )
     */
    public function show()
    {
        // Документация для метода show()
    }

    /**
     * @OA\Patch(
     *     path="/api/posts/{post}",
     *     summary="Обновить пост",
     *     tags={"Posts"},
     *     @OA\Parameter(
     *         name="post",
     *         in="path",
     *         required=true,
     *         description="ID поста",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="user_id", type="integer", example=1),
     *             @OA\Property(property="body", type="string", example="Обновленное содержание поста")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Пост успешно обновлен",
     *         @OA\JsonContent(ref="#/components/schemas/Post")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Ошибка валидации"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Пост не найден"
     *     )
     * )
     */
    public function update()
    {
        // Документация для метода update()
    }

    /**
     * @OA\Delete(
     *     path="/api/posts/{post}",
     *     summary="Удалить пост",
     *     tags={"Posts"},
     *     @OA\Parameter(
     *         name="post",
     *         in="path",
     *         required=true,
     *         description="ID поста",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Пост успешно удален"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Пост не найден"
     *     )
     * )
     */
    public function destroy()
    {
        // Документация для метода destroy()
    }

    /**
     * @OA\Get(
     *     path="/api/posts/{post}/comments",
     *     summary="Получить комментарии поста",
     *     tags={"Posts"},
     *     @OA\Parameter(
     *         name="post",
     *         in="path",
     *         required=true,
     *         description="ID поста",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Успешный запрос",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Comment")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Пост не найден"
     *     )
     * )
     */
    public function comments()
    {
        // Документация для метода comments()
    }
}
