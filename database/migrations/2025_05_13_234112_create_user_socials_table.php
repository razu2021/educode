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
        Schema::create('user_socials', function (Blueprint $table) {
           $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('facebook',255)->nullable();
            $table->string('twitter',255)->nullable();
            $table->string('linkedin',255)->nullable();
            $table->string('youtube',255)->nullable();
            $table->string('github',255)->nullable();
            $table->integer('verify')->default(0);
            $table->string('verify_note',255)->nullable();
            // Defualt 
            $table->string('slug',255)->nullable();
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
        Schema::dropIfExists('user_socials');
    }
};
