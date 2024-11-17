<?php

namespace Database\Seeders;

use App\Models\Admins\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run()
    {
        Comment::factory()->count(30)->create();
    }
}


