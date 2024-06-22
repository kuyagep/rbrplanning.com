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
        Schema::create('grades', function (Blueprint $table) {

            $table->id();
            $table->string('name'); // Grade name, e.g., "Grade 1", "Kindergarten"
            $table->string('grade_level'); // Grade level, e.g., "Elementary", "Junior High School", "Senior High School"
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
