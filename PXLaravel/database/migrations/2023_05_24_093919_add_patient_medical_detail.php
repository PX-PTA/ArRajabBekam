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
            $table->string('surgery_details')->nullable();
            $table->string('drug_details')->nullable();            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('patients', 'drug_details'))
        {
            Schema::table('patients', function (Blueprint $table)
            {
                $table->dropColumn('drug_details');
            });
        }
        if (Schema::hasColumn('patients', 'surgery_details'))
        {
            Schema::table('patients', function (Blueprint $table)
            {
                $table->dropColumn('surgery_details');
            });
        }
    }
};
