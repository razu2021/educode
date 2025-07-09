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
        Schema::create('discount_coupons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); // কে ভিডিওটা আপলোড করলো
            $table->string('code')->unique(); // e.g., RAJU50
            $table->enum('type', ['course', 'subscription', 'global'])->default('course');

            $table->foreignId('course_id')->nullable()->constrained()->onDelete('cascade'); // course coupon
            $table->foreignId('subscription_plan_id')->nullable()->constrained()->onDelete('cascade'); // subscription coupon

         
            $table->enum('discount_type', ['percentage', 'fixed'])->default('fixed');
            $table->decimal('discount_amount', 8, 2);

            $table->unsignedInteger('max_usage')->nullable(); // কতবার ব্যবহার করা যাবে
            $table->unsignedInteger('used')->default(0);      // কতবার ব্যবহার হয়েছে

            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

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
        Schema::dropIfExists('discount_coupons');
    }
};
