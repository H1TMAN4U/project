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
        Schema::create('rating', function (Blueprint $table) {
        $table->integer('rating');
        $table->longText('review');

        $table->unsignedBigInteger('recipes_id');
        $table->unsignedBigInteger('users_id');

        $table->foreign('recipes_id')->references('id')->on('recipes')->onDelete('cascade');
        $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        $table->unique(['recipes_id', 'users_id']); // Ensure each user can only rate a recipe once

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookmarks');
    }
};
