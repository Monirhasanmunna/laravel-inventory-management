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
            $table->foreignId('sub_category_id')->constrained('sub_categories')->onDelete('cascade');
            $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade');
            $table->foreignId('unit_id')->constrained('units')->onDelete('cascade');
            $table->bigInteger('vat_rate')->nullable();
            $table->enum('vat_type',['exclusive','inclusive']);
            $table->string('name');
            $table->string('model');
            $table->string('item_code')->unique();
            $table->string('regular_price');
            $table->string('discount')->nullable();
            $table->string('selling_price');
            $table->string('note')->nullable();
            $table->string('alert_quantity')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->string('image')->nullable();
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
