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
        Schema::table('ods_ambulance_indicators', function (Blueprint $table) {
            $table->string('filling_call_card', 255)->change();
            $table->string('age', 255)->change();
            $table->integer('excel_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ods_ambulance_indicators', function (Blueprint $table) {
            //
        });
    }
};
