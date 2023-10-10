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
        Schema::create('filial_sub_weeks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->unsignedBigInteger('sub_filial_id')->nullable();
            $table->unsignedBigInteger('week_id')->nullable();
            $table->integer('g_appeal')->nullable();
            $table->integer('g_sleeping')->nullable();
            $table->integer('g_ambulator')->nullable();
            $table->integer('y_appeal')->nullable();
            $table->integer('y_sleeping')->nullable();
            $table->integer('y_ambulator')->nullable();
            $table->integer('r_appeal')->nullable();
            $table->integer('r_sleeping')->nullable();
            $table->integer('r_death')->nullable();
            $table->integer('r_dead')->nullable();
            $table->integer('ambulance_03')->nullable();
            $table->integer('children_03')->nullable();
            $table->integer('arrived_himself')->nullable();
            $table->integer('children_arrived_himself')->nullable();
            $table->integer('came_ticket')->nullable();
            $table->integer('children_came_ticket')->nullable();
            $table->integer('recumbent')->nullable();
            $table->integer('children_recumbent')->nullable();
            $table->integer('operation')->nullable();
            $table->integer('children_operation')->nullable();
            $table->integer('high_tech_operas')->nullable();
            $table->integer('children_high_tech_operas')->nullable();
            $table->integer('death')->nullable();
            $table->integer('children_death')->nullable();
            $table->integer('ambulator')->nullable();
            $table->integer('children_ambulator')->nullable();
            $table->integer('ambulatory_operas')->nullable();
            $table->integer('including_children')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filial_sub_weeks');
    }
};
