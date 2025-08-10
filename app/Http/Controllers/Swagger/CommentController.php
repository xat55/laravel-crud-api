<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Comments",
 *     description="Операции с комментариями"
 * )
 */
class CommentController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/comments",
     *     summary="Получить список комментариев",
     *     tags={"Comments"},
     *     @OA\Response(
     *         response=200,
     *         description="Успешный запрос",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Comment")
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
     *     path="/api/comments",
     *     summary="Создать новый комментарий",
     *     tags={"Comments"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"post_id", "user_id", "body"},
     *             @OA\Property(property="post_id", type="integer", example=1),
     *             @OA\Property(property="user_id", type="integer", example=1),
     *             @OA\Property(property="body", type="string", example="Текст комментария")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Комментарий успешно создан",
     *         @OA\JsonContent(ref="#/components/schemas/Comment")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Ошибка валидации"
     *     ),
     *     security={{"bearerAuth": {}}}
     * )
     */
    public function store()
    {
        // Документация для метода store()
    }

    /**
     * @OA\Get(
     *     path="/api/comments/{comment}",
     *     summary="Получить комментарий по ID",
     *     tags={"Comments"},
     *     @OA\Parameter(
     *         name="comment",
     *         in="path",
     *         required=true,
     *         description="ID комментария",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Успешный запрос",
     *         @OA\JsonContent(ref="#/components/schemas/Comment")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Комментарий не найден"
     *     )
     * )
     */
    public function show()
    {
        // Документация для метода show()
    }

    /**
     * @OA\Patch(
     *     path="/api/comments/{comment}",
     *     summary="Обновить комментарий",
     *     tags={"Comments"},
     *     @OA\Parameter(
     *         name="comment",
     *         in="path",
     *         required=true,
     *         description="ID комментария",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="body", type="string", example="Обновленный текст комментария")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Комментарий успешно обновлен",
     *         @OA\JsonContent(ref="#/components/schemas/Comment")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Ошибка валидации"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Комментарий не найден"
     *     ),
     *     security={{"bearerAuth": {}}}
     * )
     */
    public function update()
    {
        // Документация для метода update()
    }

    /**
     * @OA\Delete(
     *     path="/api/comments/{comment}",
     *     summary="Удалить комментарий",
     *     tags={"Comments"},
     *     @OA\Parameter(
     *         name="comment",
     *         in="path",
     *         required=true,
     *         description="ID комментария",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Комментарий успешно удален"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Комментарий не найден"
     *     ),
     *     security={{"bearerAuth": {}}}
     * )
     */
    public function destroy()
    {
        // Документация для метода destroy()
    }
}
