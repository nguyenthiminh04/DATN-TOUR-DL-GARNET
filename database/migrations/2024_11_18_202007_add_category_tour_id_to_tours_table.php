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
        Schema::table('tours', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('category_tour_id')->nullable()->after('price_children');
            $table->foreign('category_tour_id')->references('id')->on('category_tour')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tours', function (Blueprint $table) {
            //
            $table->dropForeign(['category_tour_id']);
            $table->dropColumn('category_tour_id');
        });
    }
};
