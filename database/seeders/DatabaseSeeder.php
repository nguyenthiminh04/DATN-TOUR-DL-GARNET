<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Faq;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // for ($i=1; $i < 6; $i++) { 
        //     User::create([
        //         'name' => 'User '. $i,
        //         'email' => 'user'. $i. '@example.com',
        //         'password' => Hash::make('12345'),
        //         'phone' => 00000 . $i,
        //         'address' => "Hòa Bình",
        //         'avatar' => 'avt1',
        //         'birth' => fake()->date(),
        //         'gender' => 'nam',
        //         'role_id' => 2,
        //     ]);
        // }
        for ($i = 1; $i < 21; $i++) {
            Faq::create([
                'question' => 'bạn muốn gì?',
                'answer' => 'tôi muốn ăn cơm',
                'status_id' => 1,
            ]);
        }
    }
}
