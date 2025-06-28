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
        Schema::create('course_topic_videos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('topic_id')->constrained('course_topics')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); // কে ভিডিওটা আপলোড করলো

            $table->string('title');           // ভিডিও নাম
            $table->text('description')->nullable(); // ঐচ্ছিক বিস্তারিত

            $table->string('video_url');       // ভিডিও path / link (storage or external)
            $table->integer('duration')->nullable(); // ভিডিও দৈর্ঘ্য (সেকেন্ডে)

            $table->enum('video_type', ['file', 'youtube', 'vimeo', 'external'])->default('file'); // ভিডিও কিসের মাধ্যমে আপলোড
            $table->integer('position')->default(0);  // ভিডিওর সিকোয়েন্স

            $table->boolean('is_preview')->default(false); // ফ্রি প্রিভিউ?
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
        Schema::dropIfExists('course_topic_videos');
    }
};
