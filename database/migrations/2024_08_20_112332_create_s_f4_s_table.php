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
        Schema::create('s_f4_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_year_id')->constrained()->cascadeOnDelete();
            $table->foreignId('section_id')->constrained()->cascadeOnDelete();
            $table->date('report_month'); // Use date type to store the month of the report
            $table->integer('registered_learners_male');
            $table->integer('registered_learners_female');
            $table->integer('daily_ave_male');
            $table->integer('daily_ave_female');
            $table->integer('percentage_for_the_month_male');
            $table->integer('percentage_for_the_month_female');
            $table->integer('dropped_out_previous_month_male');
            $table->integer('dropped_out_previous_month_female');
            $table->integer('dropped_out_end_of_month_male');
            $table->integer('dropped_out_end_of_month_female');
            $table->integer('transferred_out_previous_month_male');
            $table->integer('transferred_out_previous_month_female');
            $table->integer('transferred_out_end_of_month_male');
            $table->integer('transferred_out_end_of_month_female');
            $table->integer('transferred_in_previous_month_male');
            $table->integer('transferred_in_previous_month_female');
            $table->integer('transferred_in_end_of_month_male');
            $table->integer('transferred_in_end_of_month_female');
            $table->timestamps();

            $table->unique(['section_id', 'report_month']); // Add unique constraint
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_f4_s');
    }
};
