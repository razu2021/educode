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
        Schema::create('homebanners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('page_name')->nullable();
            $table->string('banner_title')->nullable();
            $table->string('banner_heading')->nullable();
            $table->text('banner_caption')->nullable();
            $table->string('banner_button1')->nullable();
            $table->string('banner_button2')->nullable();
            $table->string('button1_url')->nullable();
            $table->string('button2_url')->nullable();
            $table->string('banner_image')->nullable();
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
        Schema::dropIfExists('homebanners');
    }
};
