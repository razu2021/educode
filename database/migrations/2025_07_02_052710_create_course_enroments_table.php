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
        Schema::create('course_enroments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->onDelete('cascade'); // কোন কোর্সের টপিক
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); 
            // Schedule details
            $table->timestamp('enrolled_at')->nullable();
            $table->enum('enrollment_type', ['free', 'paid', 'subscription'])->default('free');
            $table->unsignedBigInteger('payment_id')->nullable(); // optional link
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');
           
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
        Schema::dropIfExists('course_enroments');
    }
};
