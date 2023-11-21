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
        Schema::create('ods_ambulance_brigades', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('brigade_number')->nullable();
            $table->unsignedBigInteger('brigade_id')->nullable();
            $table->unsignedBigInteger('substation_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ods_ambulance_brigades');
    }
};
