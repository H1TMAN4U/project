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
                ['name' => 'DINNERS'],
                ['name' => 'LUNCHES'],
                ['name' => 'BREAKFAST'],
                ['name' => 'DESSERTS'],
                ['name' => 'SNACKS AND APPETIZERS'],
                ['name' => 'DRINKS'],
                ['name' => 'HOLIDAYS AND SEASONS'],
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
