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
        Schema::create('course_shedules', function (Blueprint $table) {
           $table->id();
            $table->foreignId('course_id')->constrained()->onDelete('cascade'); // কোন কোর্সের টপিক
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); 
              // Schedule details
            $table->json('days_of_week');
            $table->time('start_time');
            $table->time('end_time');

            // Optional: schedule type
            $table->enum('class_type', ['live', 'recorded'])->default('live');
           
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
        Schema::dropIfExists('course_shedules');
    }
};
