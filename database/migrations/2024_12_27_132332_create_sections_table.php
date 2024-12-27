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
        Schema::create('sections', function (Blueprint $table) {
            $table->bigIncrements('SectionID'); // Primary key
            $table->integer('Semester');
            $table->integer('Year');
            $table->unsignedBigInteger('CourseID'); // Foreign key to courses table
            $table->unsignedBigInteger('InstructorID'); // Foreign key to instructors table
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('CourseID')->references('CourseID')->on('courses')->onDelete('cascade');
            $table->foreign('InstructorID')->references('InstructorID')->on('instructors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
