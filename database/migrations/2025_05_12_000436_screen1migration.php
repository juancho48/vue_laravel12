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
        // Seed the screen1 table with 50 records
        \App\Models\Screen1::factory()->count(50)->create();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
