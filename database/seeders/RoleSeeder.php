<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'Admin', 'display_name' => 'Administrator', 'description' => 'Full access to the system', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Tour Guide', 'display_name' => 'Tour Guide', 'description' => 'Can manage tours', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Manager', 'display_name' => 'Manager', 'description' => 'Can manage users and tours', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}