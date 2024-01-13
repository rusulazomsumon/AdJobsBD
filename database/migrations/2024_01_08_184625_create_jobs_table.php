<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('category_id');
            $table->string('location');
            $table->string('vacancy');
            $table->string('salary'); // Adjust based on your data type
            $table->string('type');
            $table->string('experience_level');
            $table->string('skills'); // Consider using JSON for flexibility
            $table->string('education_level');
            $table->string('benefits');
            $table->date('deadline');
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            // Inclusive fields
            $table->text('accessibility_needs')->nullable(); 
            $table->text('strengths_and_skills')->nullable();
            $table->text('suggested_accommodations')->nullable();

            // Foreign keys
            $table->foreign('company_id')->references('id')->on('company');
            $table->foreign('category_id')->references('id')->on('job_category');

            // Ensure InnoDB engine for foreign key support
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
