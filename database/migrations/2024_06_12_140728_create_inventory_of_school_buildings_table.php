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
        Schema::create('inventory_of_school_buildings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained()->cascadeOnDelete();
            $table->foreignId('school_year_id')->constrained()->cascadeOnDelete();
            $table->integer('good_condition')->nullable();
            $table->integer('minor_repair')->nullable();
            $table->integer('major_repair')->nullable();
            $table->integer('condemnation_demolition')->nullable();
            $table->integer('on_going_contruction')->nullable();
            $table->integer('for_completion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_of_school_buildings');
    }
};
