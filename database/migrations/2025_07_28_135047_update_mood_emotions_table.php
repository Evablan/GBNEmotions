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
        Schema::table('mood_emotions', function (Blueprint $table) {
            $table->boolean('answer_1')->nullable();
            $table->boolean('answer_2')->nullable();
            $table->boolean('answer_3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mood_emotions', function (Blueprint $table) {
            $table->dropColumn(['answer_1', 'answer_2', 'answer_3']);
        });
    }
};
