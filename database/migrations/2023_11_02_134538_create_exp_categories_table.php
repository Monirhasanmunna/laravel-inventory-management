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
        Schema::create('exp_categories', function (Blueprint $table) {
            $table->id();
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
        Schema::dropIfExists('exp_categories');
    }
};
