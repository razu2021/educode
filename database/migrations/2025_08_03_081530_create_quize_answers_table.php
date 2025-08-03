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
        Schema::create('quize_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('question_id');
            
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');   
            // assignment details
            $table->text('qustion')->nullable(); // e.g., "July Morning Batch"
            $table->string('student_answer')->nullable(); // e.g., "July Morning Batch"
            $table->string('instructor_answer')->nullable(); // e.g., "July Morning Batch"
            $table->integer('mark')->nullable(); // e.g., "July Morning Batch"
          
            $table->integer('is_downloadable')->nullable(); 
            // defualt feild
            $table->string('slug',255)->nullable();
            $table->integer('creator_id')->nullable();
            $table->integer('editor_id')->nullable();
            $table->integer('status')->default(1);
            $table->integer('public_status')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('question_id')->references('id')->on('course_quiz_questions')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quize_answers');
    }
};
