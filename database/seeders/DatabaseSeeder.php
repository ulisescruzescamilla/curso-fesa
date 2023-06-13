<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create(); // 10 usuario aleatorios

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //      'email' => 'test@example.com',
        // ]); // genera 1 usuario con nombre 'Test User' y con correo 'test@example.com', las demas columnas, tomalas del factory

        \App\Models\Category::factory(10)->create();
    }
}
