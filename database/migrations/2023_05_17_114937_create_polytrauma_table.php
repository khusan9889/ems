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
        Schema::create('polytrauma', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->nullable()->constrained('branch')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            // $table->string('department')->nullable();
            $table->string('history_disease')->nullable();
            $table->string('full_name')->nullable();
            $table->string('hospitalization_date')->nullable();
            $table->string('discharge_date')->nullable();
            $table->string('hospitalization_channels')->nullable();
            $table->string('days_amount')->nullable();
            $table->string('days_in_intensive_care')->nullable();
            $table->string('treatment_result')->nullable();
            $table->string('severity_of_ts')->nullable();
            $table->string('injury_of_iss')->nullable();
            $table->string('arrival_after_injury')->nullable();
            $table->string('mechanism_of_injury')->nullable();
            $table->string('survey_of_surgeon')->nullable();
            $table->string('survey_of_neurosurgeon')->nullable();
            $table->string('survey_of_traumatologist')->nullable();
            $table->string('narrow_specialists')->nullable();
            $table->string('r_graphy')->nullable();
            $table->string('conducted_ultrasound')->nullable();
            $table->string('msct')->nullable();
            $table->string('msct_individual_parts')->nullable();
            $table->string('neutral_fats')->nullable();
            $table->string('analysis_of_hb_ht')->nullable();
            $table->string('dynamic_uzs')->nullable();
            $table->string('diagnostic_laparoscopy')->nullable();
            $table->string('thoracocentesis')->nullable();
            $table->string('laparotomy')->nullable();
            $table->string('thoracoscopy_thoracotomy')->nullable();
            $table->string('osteosynthesis_of_fractures')->nullable();
            $table->string('skull_trepanation')->nullable();
            $table->string('physician_full_name')->nullable();
            $table->string('stat_department_full_name')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polytrauma');
    }
};
