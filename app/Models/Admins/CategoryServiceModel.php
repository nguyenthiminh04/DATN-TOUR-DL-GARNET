<?php

namespace App\Models\Admins;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryServiceModel extends Model
{
    use HasFactory;
    protected $table = 'category_services';

    protected $fillable = [
        'category_name',
        'status',
    ];

    static public function getAll()
    {
        return  self::select('category_services.*')
            ->where('status', 1)
            ->get();
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }
}
