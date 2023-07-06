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
            $table->string("extra_complaint")->nullable();
            $table->string("urine_color")->nullable();
            $table->string("urine_freq")->nullable();
            $table->string("feces_details")->nullable();
            $table->string("feces_freq")->nullable();
            $table->string("drink_prefer")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('medical_records', 'extra_complaint'))
        {
            Schema::table('medical_records', function (Blueprint $table)
            {
                $table->dropColumn('extra_complaint');
            });
        }
        if (Schema::hasColumn('medical_records', 'urine_color'))
        {
            Schema::table('medical_records', function (Blueprint $table)
            {
                $table->dropColumn('urine_color');
            });
        }
        if (Schema::hasColumn('medical_records', 'urine_freq'))
        {
            Schema::table('medical_records', function (Blueprint $table)
            {
                $table->dropColumn('urine_freq');
            });
        }
        if (Schema::hasColumn('medical_records', 'feces_details'))
        {
            Schema::table('medical_records', function (Blueprint $table)
            {
                $table->dropColumn('feces_details');
            });
        }
        if (Schema::hasColumn('medical_records', 'feces_freq'))
        {
            Schema::table('medical_records', function (Blueprint $table)
            {
                $table->dropColumn('feces_freq');
            });
        }
        if (Schema::hasColumn('medical_records', 'drink_prefer'))
        {
            Schema::table('medical_records', function (Blueprint $table)
            {
                $table->dropColumn('drink_prefer');
            });
        }
    }
};
