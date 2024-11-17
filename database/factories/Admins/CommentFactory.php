<?php
namespace Database\Factories\Admins;

use App\Models\Admins\Comment as AdminsComment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = AdminsComment::class;

    public function definition()
    {
        return [
            'reply_id' => $this->faker->randomElement([null, $this->faker->numberBetween(1, 10)]), // Giả sử có 10 bình luận tồn tại
            'user_id' => User::factory(),
            'article_id' => null, // Hoặc có thể thay đổi nếu cần
            'tour_id' => $this->faker->randomElement([null, $this->faker->numberBetween(1, 5)]),
            'content' => $this->faker->text(),
            'image' => $this->faker->imageUrl(),
            'status' => 1,
        ];
    }
    
}
