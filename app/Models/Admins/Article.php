<?php

namespace App\Models\Admins;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'articles';

    protected $fillable = [
        'title',
        'slug',
        'show_home',
        'active',
        'view',
        'description',
        'img_thumb',
        'content',
        'category_id',
        'user_id',
        'status',
    ];

    protected $dates = ['deleted_at'];

    // Thiết lập mối quan hệ với model Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Thiết lập mối quan hệ với model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scope lọc bài viết kích hoạt
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    // Scope bài viết hiển thị trên trang chủ
    public function scopeShowOnHome($query)
    {
        return $query->where('show_home', 1);
    }
}
