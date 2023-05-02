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
        Schema::create('recipes_changes', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('recipes_id');
            $table->unsignedBigInteger('users_id');
            $table->foreign('recipes_id')->references('id')->on('recipes')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');

            $table->json('old');
            $table->json('new');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes_changes');
    }
};
