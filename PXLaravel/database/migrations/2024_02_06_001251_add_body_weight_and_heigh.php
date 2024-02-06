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
        Schema::table('patients', function (Blueprint $table) {
            $table->integer('weight')->nullable();
            $table->integer('height')->nullable();
        });
        Schema::table('medical_records', function (Blueprint $table) {
            $table->integer('weight')->nullable();
            $table->integer('height')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('patients', 'weight'))
        {
            Schema::table('patients', function (Blueprint $table)
            {
                $table->dropColumn('weight');
            });
        }
        if (Schema::hasColumn('patients', 'height'))
        {
            Schema::table('patients', function (Blueprint $table)
            {
                $table->dropColumn('height');
            });
        }

        if (Schema::hasColumn('medical_records', 'height'))
        {
            Schema::table('medical_records', function (Blueprint $table)
            {
                $table->dropColumn('height ');
            });
        }
        if (Schema::hasColumn('medical_records', 'weight'))
        {
            Schema::table('medical_records', function (Blueprint $table)
            {
                $table->dropColumn('weight ');
            });
        }
    }
};
