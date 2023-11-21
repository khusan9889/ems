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
        Schema::create('ods_ambulance_hospitals', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('region_coato')->nullable();
            $table->string('district_coato')->nullable();
            $table->unsignedBigInteger('hospital_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ods_ambulance_hospitals');
    }
};
