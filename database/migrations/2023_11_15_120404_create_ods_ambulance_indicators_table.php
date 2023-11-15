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
            $table->integer('indicator_id');
            $table->string('call_region_coato');
            $table->string('call_district_coato');
            $table->integer('substation_id');
            $table->boolean('filling_call_card');
            $table->integer('call_type_id');
            $table->string('card_number');
            $table->dateTime('call_received');
            $table->dateTime('call_reception');
            $table->dateTime('beginning_formation_ct');
            $table->dateTime('completion_formation_ct');
            $table->dateTime('transfer_brigade');
            $table->dateTime('brigade_departure');
            $table->dateTime('arrival_brigade_place');
            $table->dateTime('transportation_start');
            $table->dateTime('arrival_medical_center');
            $table->dateTime('call_end');
            $table->dateTime('return_substation');
            $table->integer('brigade_id');
            $table->text('address');
            $table->integer('reason_id');
            $table->string('gender');
            $table->integer('age');
            $table->string('residence_region_coato');
            $table->string('residence_district_coato');
            $table->string('diagnos');
            $table->integer('call_result_id');
            $table->integer('hospital_id');
            $table->integer('hospitalization_result_id');
            $table->integer('called_person_id');
            $table->integer('call_place_id');
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
