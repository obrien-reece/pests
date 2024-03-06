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
      Schema::create('pests', function (Blueprint $table) {
        $table->id();
        $table->string('pest_name');
        $table->string('crop_attacked');
        $table->string('devastation_severity');
        $table->string('temperature_threshold_celsius');
        $table->string('humidity_threshold_percent');
        $table->string('prevention_measures');
        $table->string('emergency_treatment');
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::dropIfExists('pests');
    }
  };
