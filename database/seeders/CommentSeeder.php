<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Создаем комментарии для каждого поста
        Post::all()->each(function ($post) {
            Comment::factory()->count(2)->create([
                'post_id' => $post->id,
                'user_id' => User::inRandomOrder()->first()->id,
            ]);
        });

        // Создаем тестовый комментарий
        Comment::factory()->create([
            'post_id' => Post::where('body', 'This is a test post')->first()->id,
            'user_id' => User::where('name', 'Test User')->first()->id,
            'body' => 'This is a test comment',
        ]);
    }
}
