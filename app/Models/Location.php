<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'content',
        'status',
        'tour_id',
        'user_id',
    ];

    protected $table = 'locations';

    public $timestamps = true; // Nếu bạn có timestamps

    // Lấy tất cả địa điểm
    public function getAll()
    {
        return DB::table('locations')
            ->orderBy('id', 'DESC')
            ->get();
    }

    // Thêm địa điểm
    public function createLocation($data)
    {
        return DB::table('locations')->insert([
            'name' => $data['name'],
            'slug' => $data['slug'],
            'image' => $data['image'],
            'description' => $data['description'],
            'content' => $data['content'],
            'status' => $data['status'],
            'tour_id' => $data['tour_id'],
            'user_id' => $data['user_id'],
        ]);
    }

    // Cập nhật địa điểm
    public function updateLocation($data, $id)
    {
        return DB::table('locations')
            ->where('id', $id)
            ->update($data);
    }

    // Xóa địa điểm
    public function deleteLocation($id)
    {
        return DB::table('locations')
            ->where('id', $id)
            ->delete();
    }
}
