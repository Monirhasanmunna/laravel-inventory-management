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
        Schema::create('exp_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exp_category_id')->constrained('exp_categories')->onDelete('cascade');
            $table->string('name')->unique();
            $table->text('note')->nullable();
            $table->enum('status',['active','inactive']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exp_sub_categories');
    }
};
