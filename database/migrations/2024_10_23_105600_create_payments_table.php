<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id'); // Khóa chính
            $table->unsignedBigInteger('booking_id'); // ID của booking
            $table->unsignedBigInteger('user_id'); // ID của người dùng
            $table->decimal('money', 10, 2); // Số tiền thanh toán
            $table->string('p_note', 255)->nullable(); // Ghi chú thanh toán
            $table->string('vnp_response_code', 255)->nullable(); // Mã phản hồi từ VNPay
            $table->string('transaction', 255)->nullable(); // Mã giao dịch
            $table->string('code_vnpay', 255)->nullable(); // Mã VNPay
            $table->string('code_bank', 255)->nullable(); // Mã ngân hàng
            $table->dateTime('time'); // Thời gian thanh toán
            $table->string('trang_thai', 50)->nullable(); // Trạng thái thanh toán
            $table->timestamps(); // Cột created_at và updated_at
            $table->softDeletes(); // Cột delete_at để hỗ trợ xóa mềm

            // Ràng buộc khóa ngoại
            $table->foreign('booking_id')->references('id')->on('book_tour')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
