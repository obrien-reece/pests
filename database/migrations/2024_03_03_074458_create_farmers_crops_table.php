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
        Schema::create('farm', function (Blueprint $table) {
            $table->id();
            $table->foreignId('farmer_id')->references('id')->on('users')->cascadeOnDelete();
            $table->string('farm_name')->nullable();
            $table->string('farm_location')->nullable();
            $table->string('crop_name')->nullable();
            $table->string('farm_size')->nullable();
            $table->string('production_years')->nullable();
            $table->string('experience')->nullable();
            $table->string('farming_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmers_crops');
    }
};
