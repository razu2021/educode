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
        Schema::create('copy_rights', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('receved_by')->nullable();
            $table->string('design_by')->nullable();
            $table->string('receiver_url')->nullable();
            $table->string('designer_url')->nullable();
            $table->string('receiver_icon')->nullable(); 
            $table->string('designer_icon')->nullable();
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
        Schema::create('copy_rights',function(Blueprint $table){
            $table->dropSoftDeletes();
        });
    }
};
