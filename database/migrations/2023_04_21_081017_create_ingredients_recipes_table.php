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
        Schema::create('ingredients_recipes', function (Blueprint $table) {
            $table->id();
            $table->float('amount');
            $table->unsignedBigInteger('ingredients_id');
            $table->unsignedBigInteger('recipes_id');
            $table->foreign('ingredients_id')->references('id')->on('ingredients')->onDelete('cascade');
            $table->foreign('recipes_id')->references('id')->on('recipes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredients_recipes');
    }
};
