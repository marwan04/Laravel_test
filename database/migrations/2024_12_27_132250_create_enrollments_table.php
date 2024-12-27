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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->bigIncrements('EnrollmentID'); // Primary key
            $table->unsignedBigInteger('StudentID'); // Foreign key to students table
            $table->unsignedBigInteger('SectionID'); // Foreign key to sections table
            $table->integer('NumericMark')->nullable();
            $table->string('alphaMark')->nullable();
            $table->boolean('Completed')->default(false);
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('StudentID')->references('StudentID')->on('students')->onDelete('cascade');
            $table->foreign('SectionID')->references('SectionID')->on('sections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
