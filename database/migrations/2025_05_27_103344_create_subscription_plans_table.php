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
        Schema::create('subscription_plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('plan_for'); // Free, Standard, Premium
            $table->string('name'); // Free, Standard, Premium
            $table->decimal('price', 8, 2)->nullable();
            $table->decimal('usd_price', 8, 2)->nullable();
            $table->longText('features')->nullable(); // JSON format অথবা টেক্সট
            $table->string('interval')->default('monthly'); // monthly, yearly
            $table->integer('course_limit')->default(1); // free plan e 1 ta course limit
            $table->integer('plan_type')->default(0);
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
        Schema::dropIfExists('subscription_plans');
    }
};
