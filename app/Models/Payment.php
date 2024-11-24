<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';

    // Cột nào được phép gán giá trị (mass assignment)
    protected $fillable = [
        'booking_id',
        'user_id',
        'money',
        'p_note',
        'vnp_response_code',
        'transaction',
        'code_vnpay',
        'code_bank',
        'time',
        'status_id',
        'payment_method_id'
    ];

    // Quan hệ với bảng book_tour (một payment thuộc một booking)
    public function booking()
    {
        return $this->belongsTo(BookTour::class, 'booking_id');
    }

    // Quan hệ với bảng users (một payment thuộc một người dùng)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
    // app/Models/Pay.php
public function bookTours()
{
    return $this->hasMany(BookTour::class, 'pay_id');
}

}
