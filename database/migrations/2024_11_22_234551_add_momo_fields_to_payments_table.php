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
        Schema::table('payments', function (Blueprint $table) {
            $table->string('momo_transaction_id')->nullable(); // Mã giao dịch MoMo
            $table->string('momo_response_code')->nullable(); // Mã phản hồi từ MoMo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn('momo_transaction_id');
            $table->dropColumn('momo_response_code');
        });
    }
};
