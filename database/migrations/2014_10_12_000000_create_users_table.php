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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            // // $table->foreignId('role_id');
            // $table->unsignedBigInteger('role_id');
            // $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            // // $table->unsignedBigInteger('role_id');
            // // $table->foreignId('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreignId('role_id')->constrained()->onDelete('cascade');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
