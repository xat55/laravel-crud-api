<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_posts()
    {
        Post::factory()->count(3)->create();

        $response = $this->getJson('/api/posts');

        $response->assertStatus(200)
            ->assertJsonCount(3, 'data')
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'user_id', 'body', 'created_at', 'updated_at']
                ]
            ]);
    }

    /** @test */
    public function it_can_create_a_post()
    {
        $user = User::factory()->create();

        $response = $this->postJson('/api/posts', [
            'user_id' => $user->id,
            'body' => 'Test post content'
        ]);

        $response->assertStatus(201)
            ->assertJsonFragment(['body' => 'Test post content']);

        $this->assertDatabaseHas('posts', [
            'user_id' => $user->id,
            'body' => 'Test post content'
        ]);
    }

    /** @test */
    public function it_validates_post_creation()
    {
        // Пустой запрос
        $response = $this->postJson('/api/posts', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['user_id', 'body']);

        // Несуществующий пользователь
        $response = $this->postJson('/api/posts', [
            'user_id' => 999,
            'body' => 'Test'
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['user_id']);
    }

    /** @test */
    public function it_can_show_a_post()
    {
        $post = Post::factory()->create();

        $response = $this->getJson("/api/posts/{$post->id}");

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'id' => $post->id,
                    'user_id' => $post->user_id,
                    'body' => $post->body
                ]
            ]);
    }

    /** @test */
    public function it_returns_404_for_nonexistent_post()
    {
        $response = $this->getJson('/api/posts/999');
        $response->assertStatus(404);
    }

    /** @test */
    public function it_can_update_a_post()
    {
        $post = Post::factory()->create();
        $newUser = User::factory()->create();

        $response = $this->putJson("/api/posts/{$post->id}", [
            'user_id' => $newUser->id,
            'body' => 'Updated content'
        ]);

        $response->assertStatus(200)
            ->assertJsonFragment(['body' => 'Updated content']);

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'user_id' => $newUser->id,
            'body' => 'Updated content'
        ]);
    }

    /** @test */
    public function it_validates_post_update()
    {
        $post = Post::factory()->create();

        // Пустой запрос
        $response = $this->putJson("/api/posts/{$post->id}", []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['user_id', 'body']);

        // Несуществующий пользователь
        $response = $this->putJson("/api/posts/{$post->id}", [
            'user_id' => 999,
            'body' => 'Test'
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['user_id']);
    }

    /** @test */
    public function it_can_delete_a_post()
    {
        $post = Post::factory()->create();

        $response = $this->deleteJson("/api/posts/{$post->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }

    /** @test */
    public function it_can_list_post_comments()
    {
        $post = Post::factory()->hasComments(3)->create();

        $response = $this->getJson("/api/posts/{$post->id}/comments");

        $response->assertStatus(200)
            ->assertJsonCount(3, 'data');
    }
}
