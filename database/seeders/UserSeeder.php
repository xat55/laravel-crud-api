<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Создаем 10 пользователей
        User::factory()->count(10)->create();

        // Создаем тестового пользователя
        User::factory()->create([
            'name' => 'Test User',
        ]);
    }
}
