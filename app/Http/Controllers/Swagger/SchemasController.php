<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     title="My API",
 *     version="1.0.0",
 *     description="API documentation"
 * )
 *
 * @OA\Components(
 *     @OA\Schema(
 *         schema="User",
 *         type="object",
 *         required={"name", "email"},
 *         @OA\Property(property="id", type="integer", format="int64"),
 *         @OA\Property(property="name", type="string"),
 *         @OA\Property(property="email", type="string", format="email"),
 *         @OA\Property(property="created_at", type="string", format="date-time"),
 *         @OA\Property(property="updated_at", type="string", format="date-time")
 *     ),
 *     @OA\Schema(
 *         schema="Post",
 *         type="object",
 *         required={"user_id", "body"},
 *         @OA\Property(property="id", type="integer", format="int64"),
 *         @OA\Property(property="user_id", type="integer", example=1),
 *         @OA\Property(property="body", type="string", example="Содержание поста"),
 *         @OA\Property(property="created_at", type="string", format="date-time"),
 *         @OA\Property(property="updated_at", type="string", format="date-time")
 *     ),
 *     @OA\Schema(
 *         schema="Comment",
 *         type="object",
 *         required={"post_id", "user_id", "body"},
 *         @OA\Property(property="id", type="integer", format="int64"),
 *         @OA\Property(property="post_id", type="integer", example=1),
 *         @OA\Property(property="user_id", type="integer", example=1),
 *         @OA\Property(property="body", type="string", example="Текст комментария"),
 *         @OA\Property(property="created_at", type="string", format="date-time"),
 *         @OA\Property(property="updated_at", type="string", format="date-time")
 *     )
 * )
 */
class SchemasController extends Controller
{
    // php artisan l5-swagger:generate
}
