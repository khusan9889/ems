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
        Schema::create('acs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->nullable()->constrained('branch')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('user')->nullOnDelete();
            $table->string('department')->nullable();
            $table->string('history_disease')->nullable();
            $table->string('full_name')->nullable();
            $table->string('hospitalization_date')->nullable();
            $table->string('discharge_date')->nullable();
            $table->string('hospitalization_channels')->nullable();
            $table->string('treatment_result')->nullable();
            $table->string('final_result')->nullable();
            $table->string('anginal_attack_date')->nullable();
            $table->string('cta_invasive_angiography')->nullable();
            $table->string('cta_90min')->nullable();
            $table->string('deferred_cta_invasive')->nullable();
            $table->string('deferred_cta_completed')->nullable();
            $table->string('reasons_not_performing_cta')->nullable();
            $table->string('thrombolytic_therapy')->nullable();
            $table->string('thrombolytic_therapy_administered')->nullable();
            $table->string('not_administering_tlt')->nullable();
            $table->string('ecg_during_hospitalization')->nullable();
            $table->string('st_segment')->nullable();
            $table->string('echocardiogram')->nullable();
            $table->string('first_measurement')->nullable();
            $table->string('cholestero_levels')->nullable();
            $table->string('aptt')->nullable();
            $table->string('anticoagulant')->nullable();
            $table->string('aspirin')->nullable();
            $table->string('p2y12')->nullable();
            $table->string('high_intensity_statins')->nullable();
            $table->string('ACE_inhibitors_ARBs')->nullable();
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
        Schema::dropIfExists('acs');
    }
};
