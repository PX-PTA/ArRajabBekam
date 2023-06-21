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
            $table->foreign('medical_record_id')->references('id')->on('medical_records');
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
        if (Schema::hasColumn('medical_records', 'patient_id'))
        {
            Schema::table('medical_records', function (Blueprint $table)
            {
                $table->dropForeign(['patient_id']);
            });
        }
        if (Schema::hasColumn('finances', 'medical_record_id'))
        {
            Schema::table('finances', function (Blueprint $table)
            {
                $table->dropForeign(['medical_record_id']);
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
