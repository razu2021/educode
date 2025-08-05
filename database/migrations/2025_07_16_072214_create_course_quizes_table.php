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
        Schema::create('course_quizes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->onDelete('cascade'); // কোন কোর্সের টপিক
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');   
            // assignment details
            $table->string('title')->nullable(); // e.g., "July Morning Batch"
            $table->text('description')->nullable();
            $table->string('quize_time')->nullable();
            $table->integer('pass_mark')->nullable();
            $table->dateTime('start_at')->nullable();
            $table->dateTime('end_at')->nullable();
            $table->integer('is_downloadable')->nullable(); 
            $table->integer('user_count')->default(0);
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
        Schema::dropIfExists('course_quizes');
    }
};
