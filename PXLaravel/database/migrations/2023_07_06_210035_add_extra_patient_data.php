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
            $table->date('date_of_birth')->nullable();
            $table->string('surname')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();         
            $table->string('is_married')->default("single");   

            $table->string("medical_history_details")->nullable();
            $table->string("medical_genetic_history")->nullable();
            $table->string("food_alergy")->nullable();       
            $table->string("medicine_alergy")->nullable();       
            $table->string("others_alergy")->nullable();       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('patients', 'date_of_birth'))
        {
            Schema::table('patients', function (Blueprint $table)
            {
                $table->dropColumn('date_of_birth');
            });
        }
        if (Schema::hasColumn('patients', 'gender'))
        {
            Schema::table('patients', function (Blueprint $table)
            {
                $table->dropColumn('gender');
            });
        }
        if (Schema::hasColumn('patients', 'is_married'))
        {
            Schema::table('patients', function (Blueprint $table)
            {
                $table->dropColumn('is_married');
            });
        }
        if (Schema::hasColumn('patients', 'surname'))
        {
            Schema::table('patients', function (Blueprint $table)
            {
                $table->dropColumn('surname');
            });
        }
        if (Schema::hasColumn('patients', 'medical_history_details'))
        {
            Schema::table('patients', function (Blueprint $table)
            {
                $table->dropColumn('medical_history_details');
            });
        }
        if (Schema::hasColumn('patients', 'medical_genetic_history'))
        {
            Schema::table('patients', function (Blueprint $table)
            {
                $table->dropColumn('medical_genetic_history');
            });
        }
        if (Schema::hasColumn('patients', 'medicine_alergy'))
        {
            Schema::table('patients', function (Blueprint $table)
            {
                $table->dropColumn('medicine_alergy');
            });
        }
        if (Schema::hasColumn('patients', 'food_alergy'))
        {
            Schema::table('patients', function (Blueprint $table)
            {
                $table->dropColumn('food_alergy');
            });
        }
        if (Schema::hasColumn('patients', 'others_alergy'))
        {
            Schema::table('patients', function (Blueprint $table)
            {
                $table->dropColumn('others_alergy');
            });
        }
    }
};
