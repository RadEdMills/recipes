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
        Schema::create('origin_recipe', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Recipe::class);
            $table->foreignIdFor(\App\Models\Origin::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('origin_recipe');
    }
};
