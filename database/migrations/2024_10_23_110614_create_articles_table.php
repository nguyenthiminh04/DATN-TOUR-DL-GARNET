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
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id'); // Khóa chính
            $table->string('title', 255); // Tiêu đề bài viết
            $table->string('slug', 255); // Đường dẫn thân thiện
            $table->tinyInteger('show_home')->default(0); // Hiện trên trang chủ (0: không, 1: có)
            $table->tinyInteger('active')->default(1); // Trạng thái hoạt động (1: hoạt động, 0: không hoạt động)
            $table->integer('view')->default(0); // Số lượt xem
            $table->text('description'); // Mô tả bài viết
            $table->string('avatar', 255); // Hình đại diện
            $table->text('content'); // Nội dung bài viết
            $table->unsignedBigInteger('category_id')->nullable(); // ID của danh mục (có thể null)
            $table->unsignedBigInteger('user_id'); // ID của người dùng tạo bài viết
            $table->tinyInteger('status')->default(0); // Trạng thái bài viết (0: không công khai, 1: công khai)
            $table->timestamps(); // Cột created_at và updated_at
            $table->softDeletes(); // Cột delete_at để hỗ trợ xóa mềm

            // Ràng buộc khóa ngoại
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
