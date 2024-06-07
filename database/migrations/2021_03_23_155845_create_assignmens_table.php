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
        Schema::create('assignmens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('claint_id');
            $table->string('total_balance')->nullable();
            $table->string('exist_balance')->nullable();
            $table->string('number_of_invited')->nullable();
            $table->string('assignment_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignmens');
    }
};
