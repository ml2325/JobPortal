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
        Schema::disableForeignKeyConstraints();
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            
            $table->string('company_name');
            $table->foreignId('category_id')->constrained();
            $table->string('job_region');
            $table->string('job_type');
            $table->string('vacancy');
            $table->string('experience');
            $table->string('salary');
            $table->string('Gender');
            $table->string('application_deadline');
            $table->string('job_description');
            $table->string('responsibilities');
            $table->string('education_experience');
            $table->string('otherbenefits');
            $table->string('image');
            $table->timestamps();
            



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
