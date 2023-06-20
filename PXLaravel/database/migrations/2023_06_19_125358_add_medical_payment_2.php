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
        Schema::table('medical_records', function (Blueprint $table) {
            $table->string('total_terapist')->nullable();
            $table->string('total_clinic')->nullable();
            $table->string('total_herbal')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('medical_records', 'total_clinic'))
        {
            Schema::table('medical_records', function (Blueprint $table)
            {
                $table->dropColumn('total_clinic');
            });
        }
        if (Schema::hasColumn('medical_records', 'total_terapist'))
        {
            Schema::table('medical_records', function (Blueprint $table)
            {
                $table->dropColumn('total_terapist');
            });
        }
        if (Schema::hasColumn('medical_records', 'total_herbal'))
        {
            Schema::table('medical_records', function (Blueprint $table)
            {
                $table->dropColumn('total_herbal');
            });
        }
    }
};
