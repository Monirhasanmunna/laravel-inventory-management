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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->unsignedBigInteger('account_id')->nullable();
            $table->unsignedBigInteger('vat_id')->nullable();
            $table->string('po_reference')->nullable();
            $table->string('payment_terms')->nullable();
            $table->string('sub_total');
            $table->string('total_tax')->nullable();
            $table->string('discount')->nullable();
            $table->string('transport_cost')->nullable();
            $table->string('net_total');
            $table->string('total_paid')->nullable();
            $table->string('due_ammount')->nullable();
            $table->string('check_no')->nullable();
            $table->string('receipt_no')->nullable();
            $table->string('note')->nullable();
            $table->date('purchase_date');
            $table->date('po_date');
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
