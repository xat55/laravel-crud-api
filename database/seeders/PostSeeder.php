<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Создаем посты для каждого пользователя
        User::all()->each(function ($user) {
            Post::factory()->count(3)->create([
                'user_id' => $user->id,
            ]);
        });

        // Создаем тестовый пост
        Post::factory()->create([
            'user_id' => User::where('name', 'Test User')->first()->id,
            'body' => 'This is a test post',
        ]);
    }
}
