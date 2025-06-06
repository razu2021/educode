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
        Schema::create('course_sub_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('course_category_id')->nullable();
            $table->foreign('course_category_id')->references('id')->on('course_categories')->onDelete('cascade');
            $table->string('course_sub_category_name')->nullable();
            $table->string('course_sub_category_title')->nullable();
            $table->text('course_sub_category_des')->nullable();
            $table->string('url',255)->nullable();
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
        Schema::create('course_sub_categories',function(Blueprint $table){
            $table->dropSoftDeletes();
        });
    }
};
