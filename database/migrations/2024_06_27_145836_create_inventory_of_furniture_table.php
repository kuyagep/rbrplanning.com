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
        Schema::create('inventory_of_furniture', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained()->cascadeOnDelete();
            $table->integer('kinder_modular_table');
            $table->integer('kinder_chair');
            $table->integer('arm_chair');
            $table->integer('school_desk');
            $table->integer('other_classroom_table');
            $table->integer('other_classroom_chair');
            $table->integer('sets_of_tables_and_chairs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_of_furniture');
    }
};
