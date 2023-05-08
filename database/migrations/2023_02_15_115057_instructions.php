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
    Schema::create('instructions', function (Blueprint $table) {
        $table->id();
        $table->integer('step_number');
        $table->longText('instruction');
        $table->timestamps();
        
        $table->unsignedBigInteger('recipe_id');
        $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructions');
    }
};
