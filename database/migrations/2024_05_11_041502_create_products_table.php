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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_nr');
            $table->text('product_details');
            $table->integer('product_category');
            $table->integer('product_type');
            $table->string('weight');
            $table->integer('carat');
            $table->string('quantity');
            $table->string('st_or_dia');
            $table->string('st_or_dia_price');
            $table->string('wage');
            $table->integer('wage_type');
            $table->integer('supplier');
            $table->string('purchase_price');
            $table->integer('stock_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
