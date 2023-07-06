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
        Schema::table('finances', function (Blueprint $table) {
            $table->unsignedBigInteger('medical_record_id')->nullable();
            $table->string('finance_code')->nullable();
        });
        Schema::table('medical_records', function (Blueprint $table) {
            $table->foreign('patient_id')->references('id')->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('finances', 'medical_record_id'))
        {
            Schema::table('finances', function (Blueprint $table)
            {
                $table->dropColumn('medical_record_id');
            });
        }
        if (Schema::hasColumn('finances', 'finance_code'))
        {
            Schema::table('finances', function (Blueprint $table)
            {
                $table->dropColumn('finance_code');
            });
        }
    }
};
