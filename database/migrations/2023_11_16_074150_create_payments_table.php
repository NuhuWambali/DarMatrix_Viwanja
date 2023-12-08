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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->foreignId('plot_id')->constrained()->onDelete('cascade');
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->decimal('total_amount')->nullable();
            $table->integer('installment_period');
            $table->decimal('down_payment')->nullable();
            $table->decimal('monthly_installment_period');
            $table->integer('payment_method_id');
            $table->date('payment_date');
            $table->decimal('amount_paid')->nullable();
            $table->decimal('amount_remain');
            $table->integer('installment_number');
            $table->string('payment_status');
            $table->string('created_by');
            $table->string('modified_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
