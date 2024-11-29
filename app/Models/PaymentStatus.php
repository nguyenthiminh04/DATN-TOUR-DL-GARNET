<?php

namespace App\Models;

use App\Models\Admins\Location;
use App\Models\Admins\UserModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentStatus extends Model
{
    use HasFactory;
    protected $table = 'payment_statuses';

    
    protected $fillable = ['name'];

    // Định nghĩa mối quan hệ "hasMany" với bảng payments
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
