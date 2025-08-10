<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use App\Http\Resources\CommentResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class CommentController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return CommentResource::collection(Comment::all());
    }

    public function store(StoreCommentRequest $request): CommentResource
    {
        $comment = Comment::create($request->validated());

        return new CommentResource($comment);
    }

    public function show(Comment $comment): CommentResource
    {
        return new CommentResource($comment);
    }

    public function update(UpdateCommentRequest $request, Comment $comment): CommentResource
    {
        $comment->update($request->validated());

        return new CommentResource($comment);
    }

    public function destroy(Comment $comment): Response
    {
        $comment->delete();

        return response()->noContent();
    }
}
