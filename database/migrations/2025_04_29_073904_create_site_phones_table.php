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
        Schema::create('site_phones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('phone_type')->nullable();
            $table->string('phone')->nullable();
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
        Schema::create('site_phones',function(Blueprint $table){
            $table->dropSoftDeletes();
        });
    }
};
