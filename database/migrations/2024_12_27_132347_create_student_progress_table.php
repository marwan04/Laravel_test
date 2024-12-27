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
        Schema::create('student_progress', function (Blueprint $table) {
            $table->unsignedBigInteger('StudentID'); // Foreign key to students table
            $table->unsignedBigInteger('PlanID'); // Foreign key to plans table
            $table->integer('TotalCreditsEarned');
            $table->string('GraduationStatus');
            $table->timestamps();

            // Composite primary key
            $table->primary(['StudentID', 'PlanID']);
            // Foreign key constraints
            $table->foreign('StudentID')->references('StudentID')->on('students')->onDelete('cascade');
            $table->foreign('PlanID')->references('PlanID')->on('plans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_progress');
    }
};
