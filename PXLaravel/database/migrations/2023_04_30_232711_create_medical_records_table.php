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
        Schema::create('medical_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');         
            $table->integer("no");
            $table->date("date")->nullable();
            $table->string("complaint")->nullable();
            $table->string("diagnosis")->nullable();
            $table->string("action")->nullable();
            $table->string("medicine")->nullable();
            $table->string("blood_pressure_sys")->nullable();
            $table->string("blood_pressure_dia")->nullable();
            $table->string("terapis")->nullable();
            $table->timestamps();
            $table->softDeletes();
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
                $table->dropColumn('patient_id');
            });
        }
        Schema::dropIfExists('medical_records');
    }
};
