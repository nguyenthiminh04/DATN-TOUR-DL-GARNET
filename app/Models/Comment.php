<?php

namespace App\Models;

use App\Models\Admins\Tour;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comment';
    protected $fillable = ['tour_id', 'user_id', 'parent_id','anonymous_name', 'content'];

    // Quan hệ đến bình luận cha
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    // Quan hệ đến các bình luận con
    public function children()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    // Quan hệ đến bài viết
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    // Quan hệ đến người dùng
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
