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
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->bigInteger('parent_category_id')->unsigned();
            $table->text('name');
            $table->string('image')->default('sub_category_images/default.png');
            $table->string('color_1');
            $table->string('color_2');

            $table->foreign('parent_category_id')->references('id')->on('parent_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_categories');
    }
};
