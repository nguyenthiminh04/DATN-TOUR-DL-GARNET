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
        Schema::table('locations', function (Blueprint $table) {
             // Thêm ràng buộc khóa ngoại
             $table->unsignedBigInteger('user_id')->nullable()->change(); // Đảm bảo trường user_id có kiểu unsignedBigInteger và có thể null
             $table->foreign('tour_id')->references('id')->on('tours')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('locations', function (Blueprint $table) {
            // Xóa ràng buộc khóa ngoại khi rollback
            $table->dropForeign(['user_id']);
        });
    }
};
