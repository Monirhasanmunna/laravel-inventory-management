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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exp_category_id')->constrained('exp_categories')->onDelete('cascade');
            $table->foreignId('exp_sub_category_id')->constrained('exp_sub_categories')->onDelete('cascade');
            $table->foreignId('account_id')->constrained('accounts')->onDelete('cascade');
            $table->string('reason');
            $table->bigInteger('ammount');
            $table->string('check_no')->nullable();
            $table->string('voucher_no')->nullable();
            $table->text('note')->nullable();
            $table->date('date')->default(date('Y-m-d'));
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
