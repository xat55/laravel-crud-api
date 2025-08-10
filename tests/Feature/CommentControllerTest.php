<?php

namespace Tests\Feature;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_comments()
    {
        Comment::factory()->count(3)->create();

        $response = $this->getJson('/api/comments');

        $response->assertStatus(200)
            ->assertJsonCount(3, 'data')
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'post_id', 'user_id', 'body', 'created_at', 'updated_at']
                ]
            ]);
    }

    /** @test */
    public function it_can_create_a_comment()
    {
        $post = Post::factory()->create();
        $user = User::factory()->create();

        $response = $this->postJson('/api/comments', [
            'post_id' => $post->id,
            'user_id' => $user->id,
            'body' => 'Test comment content'
        ]);

        $response->assertStatus(201)
            ->assertJsonFragment(['body' => 'Test comment content']);

        $this->assertDatabaseHas('comments', [
            'post_id' => $post->id,
            'user_id' => $user->id,
            'body' => 'Test comment content'
        ]);
    }

    /** @test */
    public function it_validates_comment_creation()
    {
        // Пустой запрос
        $response = $this->postJson('/api/comments', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['post_id', 'user_id', 'body']);

        // Несуществующий пост и пользователь
        $response = $this->postJson('/api/comments', [
            'post_id' => 999,
            'user_id' => 999,
            'body' => 'Test'
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['post_id', 'user_id']);
    }

    /** @test */
    public function it_can_show_a_comment()
    {
        $comment = Comment::factory()->create();

        $response = $this->getJson("/api/comments/{$comment->id}");

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $comment->id,
                    'post_id' => $comment->post_id,
                    'user_id' => $comment->user_id,
                    'body' => $comment->body
                ]
            ]);
    }

    /** @test */
    public function it_returns_404_for_nonexistent_comment()
    {
        $response = $this->getJson('/api/comments/999');
        $response->assertStatus(404);
    }

    /** @test */
    public function it_can_update_a_comment()
    {
        $comment = Comment::factory()->create();
        $newPost = Post::factory()->create();
        $newUser = User::factory()->create();

        $response = $this->putJson("/api/comments/{$comment->id}", [
            'post_id' => $newPost->id,
            'user_id' => $newUser->id,
            'body' => 'Updated comment content'
        ]);

        $response->assertStatus(200)
            ->assertJsonFragment(['body' => 'Updated comment content']);

        $this->assertDatabaseHas('comments', [
            'id' => $comment->id,
            'post_id' => $newPost->id,
            'user_id' => $newUser->id,
            'body' => 'Updated comment content'
        ]);
    }

    /** @test */
    public function it_validates_comment_update()
    {
        $comment = Comment::factory()->create();

        // Пустой запрос
        $response = $this->putJson("/api/comments/{$comment->id}", []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['post_id', 'user_id', 'body']);

        // Несуществующий пост и пользователь
        $response = $this->putJson("/api/comments/{$comment->id}", [
            'post_id' => 999,
            'user_id' => 999,
            'body' => 'Test'
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['post_id', 'user_id']);
    }

    /** @test */
    public function it_can_delete_a_comment()
    {
        $comment = Comment::factory()->create();

        $response = $this->deleteJson("/api/comments/{$comment->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('comments', ['id' => $comment->id]);
    }
}
