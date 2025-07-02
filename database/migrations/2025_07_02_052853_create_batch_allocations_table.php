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
        Schema::create('batch_allocations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->onDelete('cascade'); // কোন কোর্সের টপিক
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');   
            $table->foreignId('course_batche_id')->nullable()->constrained()->onDelete('cascade');   
            // Schedule details
            $table->string('title'); // e.g., "July Morning Batch"
            $table->text('description')->nullable();

            $table->date('start_date');
            $table->date('end_date')->nullable();

            $table->integer('assign_instructor')->nullable(); // Max students
            $table->integer('capacity')->nullable(); // Max students
         
            // defualt feild
            $table->string('slug',255)->nullable();
            $table->integer('creator_id')->nullable();
            $table->integer('editor_id')->nullable();
            $table->integer('status')->default(1);
            $table->integer('public_status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batch_allocations');
    }
};
