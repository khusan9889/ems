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
        Schema::table('filial_sub_weeks', function (Blueprint $table) {
            $table->integer('acs')->nullable()->default(0);
            $table->integer('polytrauma')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('filial_sub_weeks', function (Blueprint $table) {
            $table->dropColumn('acs');
            $table->dropColumn('polytrauma');
        });
    }
};
