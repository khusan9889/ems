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
        Schema::create('ods_ambulance_indicators', function (Blueprint $table) {
            $table->id();
            $table->string('call_region_coato')->nullable();
            $table->string('call_district_coato')->nullable();
            $table->integer('substation_id')->nullable();
            $table->boolean('filling_call_card')->nullable();
            $table->integer('call_type_id')->nullable();
            $table->string('card_number')->nullable();
            $table->dateTime('call_received')->nullable();
            $table->dateTime('call_reception')->nullable();
            $table->dateTime('beginning_formation_ct')->nullable();
            $table->dateTime('completion_formation_ct')->nullable();
            $table->dateTime('transfer_brigade')->nullable();
            $table->dateTime('brigade_departure')->nullable();
            $table->dateTime('arrival_brigade_place')->nullable();
            $table->dateTime('transportation_start')->nullable();
            $table->dateTime('arrival_medical_center')->nullable();
            $table->dateTime('call_end')->nullable();
            $table->dateTime('return_substation')->nullable();
            $table->integer('brigade_id')->nullable();
            $table->text('address')->nullable();
            $table->integer('reason_id')->nullable();
            $table->string('gender')->nullable();
            $table->integer('age')->nullable();
            $table->string('residence_region_coato')->nullable();
            $table->string('residence_district_coato')->nullable();
            $table->string('diagnos')->nullable();
            $table->integer('call_result_id')->nullable();
            $table->integer('hospital_id')->nullable();
            $table->integer('hospitalization_result_id')->nullable();
            $table->integer('called_person_id')->nullable();
            $table->integer('call_place_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ods_ambulance_indicators');
    }
};
