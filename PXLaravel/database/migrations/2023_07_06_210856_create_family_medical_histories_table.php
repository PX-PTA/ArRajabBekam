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
        Schema::create('family_medical_histories', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("nik")->nullable();
            $table->string("address")->nullable();
            $table->string("phone")->nullable();
            $table->string("patient_relationship")->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->unsignedBigInteger('patient_id');   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('family_medical_histories', 'patient_id'))
        {
            Schema::table('family_medical_histories', function (Blueprint $table)
            {
                //$table->dropColumn('patient_id');
            });
        }
        Schema::dropIfExists('family_medical_histories');
    }
};
