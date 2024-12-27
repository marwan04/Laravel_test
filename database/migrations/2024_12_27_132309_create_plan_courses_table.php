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
        Schema::create('plan_courses', function (Blueprint $table) {
            $table->unsignedBigInteger('PlanID'); // Foreign key to plans table
            $table->unsignedBigInteger('CourseID'); // Foreign key to courses table

            // Composite primary key
            $table->primary(['PlanID', 'CourseID']);
            // Foreign key constraints
            $table->foreign('PlanID')->references('PlanID')->on('plans')->onDelete('cascade');
            $table->foreign('CourseID')->references('CourseID')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_courses');
    }
};
