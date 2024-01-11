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
        Schema::create('job_category', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name');
            $table->text('description');
            $table->string('category_types');
            $table->string('icon')->nullable(); // Allow for optional icons
            // Add other fields as needed, e.g., slug, priority, etc.
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_category');
    }
};
