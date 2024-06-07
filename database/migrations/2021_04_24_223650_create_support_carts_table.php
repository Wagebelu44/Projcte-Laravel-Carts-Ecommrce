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
        Schema::create('support_carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('claint_id')->unsigned();

            $table->text('cliant_email');
            $table->string('ticit_answer')->default('default');
            $table->string('ticit_reply')->default('default');
            $table->text('ticit_address');
            $table->text('ticit_type');
            $table->text('number_ticit');
            $table->text('images');
            $table->longText('details_ticit');

            $table->foreign('claint_id')->references('id')->on('cliants')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_carts');
    }
};
