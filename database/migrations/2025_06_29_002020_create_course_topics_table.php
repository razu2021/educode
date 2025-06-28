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
        Schema::create('course_topics', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('course_id')->constrained()->onDelete('cascade'); // কোন কোর্সের টপিক

            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); 
            // ইনস্ট্রাক্টর যিনি এই টপিক তৈরি করেছেন (nullable - যদি global টপিক হয়)

            $table->string('title');             // টপিকের শিরোনাম
            $table->text('description')->nullable(); // টপিকের বর্ণনা (ঐচ্ছিক)
            $table->integer('position')->default(0);  // টপিকের ক্রমানুসার (order)

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
        Schema::dropIfExists('course_topics');
    }
};
