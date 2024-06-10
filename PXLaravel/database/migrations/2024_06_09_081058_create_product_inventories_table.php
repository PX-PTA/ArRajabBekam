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
        Schema::create('product_inventories', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->enum('type', ['add', 'subtract']);
            $table->string('description');
            $table->boolean('is_active');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('sale_detail_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('sale_detail_id')->references('id')->on('sale_details');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_inventories');
    }
};
