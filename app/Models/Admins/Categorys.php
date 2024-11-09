<?php

namespace App\Models\Admins;

use App\Models\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorys extends Model
{
    use HasFactory;
    protected $table = 'categories';  // Tên bảng thực sự trong cơ sở dữ liệu
    protected $fillable = [
        'name',
        'parent_id',
        'slug',
        'avatar',
        'banner',
        'description',
        'hot',
        'type',
        'user_id',
        'status',
    ];
    public function status()
 {
     return $this->belongsTo(Status::class);
 }
 public function user()
{
    return $this->belongsTo(UserModel::class, 'user_id');
}


}
