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
            //1- Renombramos la nueva columna
            $table->renameColumn('user_id', 'employee_id');
            //2 - Cambiar tipo a string 
            $table->string('employee_id')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mood_emotions', function (Blueprint $table) {
            $table->renameColumn('employee_id', 'user_id');
            $table->integer('user_id')->change();
        });
    }
};
