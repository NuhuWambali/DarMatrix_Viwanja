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
        Schema::create('plots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->string('plot_number')->nullable();
            $table->decimal('plot_size');
            $table->string('land_use')->nullable();
            $table->integer('installment_period');
            $table->decimal('installment_price_per_sqm',10,2);
            $table->decimal('cash_price_per_sqm',10,2);
            $table->decimal('monthly_installment_price',10,2);
            $table->decimal('cash_total_value',10,2);
            $table->decimal('installment_total_value',10,2);
            $table->string('description1')->nullable();
            $table->string('description2')->nullable();
            $table->string('description3')->nullable();
            $table->string('file')->nullable();
            $table->boolean('status')->default(true);
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plots');
    }
};
