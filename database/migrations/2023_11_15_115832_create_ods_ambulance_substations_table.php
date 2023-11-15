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
        Schema::create('ods_ambulance_substations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('region_coato');
            $table->string('district_coato');
            $table->unsignedBigInteger('substation_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ods_ambulance_substations');
    }
};
