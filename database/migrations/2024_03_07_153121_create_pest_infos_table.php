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
        Schema::create('pest_infos', function (Blueprint $table) {
            $table->id();
            $table->string('pest_id');
            $table->string('description');
            $table->string('habits_and_damage');
            $table->string('management');
            $table->string('image_1');
            $table->string('image_2');
            $table->string('image_3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pest_infos');
    }
};
