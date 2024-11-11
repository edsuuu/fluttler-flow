<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'firstname' => 'John',
            'lastname' => 'Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password123'),
        ]);
        User::create([
            'firstname' => 'Teste',
            'lastname' => 'Teste',
            'email' => 'teste@example.com',
            'password' => bcrypt('password123'),
        ]);


        for ($i = 0; $i < 10; $i++) {
            User::create([
                'firstname' => fake()->firstName,
                'lastname' => fake()->lastName,
                'email' => fake()->unique()->safeEmail,
                'password' => Hash::make('password123'),
            ]);
        }
    }
}
