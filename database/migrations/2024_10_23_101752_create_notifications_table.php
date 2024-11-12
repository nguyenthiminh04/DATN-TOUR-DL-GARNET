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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
<<<<<<< HEAD
            $table->unsignedBigInteger('user_id');
=======
>>>>>>> 73c56caaa26aef2a80a3fef5b3f8c2bb51139cef
            $table->text('content');
            $table->boolean('status')->default(1);
            $table->timestamps();

<<<<<<< HEAD
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
=======
            $table->text('content');
            $table->boolean('status')->default(1);
            $table->timestamps();

>>>>>>> admins
=======
>>>>>>> 73c56caaa26aef2a80a3fef5b3f8c2bb51139cef
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
