<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->string("name");
        });

        $date=Carbon::now();
        DB::table('category')->insert(
            array(
                ['name' => 'dinners'],
                ['name' => 'lunches'],
                ['name' => 'breakfast'],
                ['name' => 'dessert'],
                ['name' => 'snacks and appetizers'],
                ['name' => 'drinks'],
                ['name' => 'holidays and seasons'],
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category');
    }
};
