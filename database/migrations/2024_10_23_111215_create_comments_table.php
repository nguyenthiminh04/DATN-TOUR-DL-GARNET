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
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id'); // Khóa chính
            $table->unsignedBigInteger('reply_id')->nullable(); // ID của bình luận trả lời (nếu có)
            $table->unsignedBigInteger('user_id'); // ID của người dùng tạo bình luận
            $table->unsignedBigInteger('article_id')->nullable(); // ID của bài viết (có thể null)
            $table->unsignedBigInteger('tour_id')->nullable(); // ID của tour (có thể null)
            $table->text('content'); // Nội dung bình luận
            $table->text('image')->nullable(); // Hình ảnh kèm theo bình luận (nếu có)
            $table->tinyInteger('status')->default(1); // Trạng thái bình luận (1: hiển thị, 0: ẩn)
            $table->timestamps(); // Cột created_at và updated_at
            $table->softDeletes(); // Cột delete_at để hỗ trợ xóa mềm

            // Ràng buộc khóa ngoại
            $table->foreign('reply_id')->references('id')->on('comments')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('set null');
            $table->foreign('tour_id')->references('id')->on('tours')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
