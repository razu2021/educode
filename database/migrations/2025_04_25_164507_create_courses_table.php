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
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade')->nullable();
            $table->unsignedBigInteger('course_category_id'); // ✅ match with bigIncrements
            $table->unsignedBigInteger('course_subcategory_id')->nullable(); // ✅ match with bigIncrements
            $table->unsignedBigInteger('course_childcategory_id')->nullable(); // ✅ match with bigIncrements
            $table->string('course_name')->nullable();
            $table->string('course_title')->nullable();
            $table->longText('course_about')->nullable();
            $table->text('course_des')->nullable();
            $table->longText('course_long_des')->nullable();
            $table->string('url',255)->nullable();
            $table->string('course_language',255)->nullable();
            $table->string('course_type',255)->nullable();
            $table->string('course_lable',255)->nullable();
            $table->string('course_time',255)->nullable();
            $table->string('course_image',255)->nullable();
            $table->enum('label', ['top','trending','upcoming','free','new','featured','beginner','popular','best_seller','bundle',])->nullable();
            $table->integer('sell')->default(0)->nullable();
            $table->integer('view_count')->default(0)->nullable();
            $table->string('slug',255)->nullable();
            $table->integer('creator_id')->nullable();
            $table->integer('editor_id')->nullable();
            $table->integer('status')->default(1);
            $table->integer('public_status')->default(0);
            $table->timestamps();
            $table->softDeletes();


             $table->foreign('course_category_id')->references('id')->on('course_categories')->onDelete('cascade');
             $table->foreign('course_subcategory_id')->references('id')->on('course_sub_categories')->onDelete('cascade');
             $table->foreign('course_childcategory_id')->references('id')->on('course_child_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('courses',function(Blueprint $table){
            $table->dropSoftDeletes();
        });
    }
};
