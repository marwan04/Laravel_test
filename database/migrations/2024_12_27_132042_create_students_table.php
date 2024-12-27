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
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('StudentID'); // Primary key
            $table->string('name');
            $table->string('email')->unique();
            $table->unsignedBigInteger('PlanID'); // Foreign key to plans table
            $table->timestamps(); // Includes created_at and updated_at

            // Foreign key constraint
            $table->foreign('PlanID')->references('PlanID')->on('plans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
