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
        Schema::create('how_uses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('description');

            $table->bigInteger('sub_categorys_id')->unsigned();

            $table->foreign('sub_categorys_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('how_uses');
    }
};
