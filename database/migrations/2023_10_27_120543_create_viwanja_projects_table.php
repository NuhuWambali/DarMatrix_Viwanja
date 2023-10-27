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
        Schema::create('viwanja_projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->string('region');
            $table->integer('total_plots');
            $table->integer('available_plots');
            $table->integer('unavailable_plots')->nullable();
            $table->text('description')->nullable();
            $table->boolean('status')->default(true);
            $table->string('plots_no');
            $table->string('block');
            $table->string('file_path')->nullable();
            $table->integer('installment_period');
            $table->decimal('price_per_sqm', 10, 2);
            $table->date('start_date');
            $table->date('end_date');
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
        Schema::dropIfExists('viwanja_projects');
    }
};
