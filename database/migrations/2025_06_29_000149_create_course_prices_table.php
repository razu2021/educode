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
        Schema::create('course_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // price কে সেট করছে
            $table->decimal('original_price', 8, 2);
            $table->decimal('discounted_price', 8, 2)->nullable();

            $table->string('currency')->default('BDT'); // Optional: 'USD', 'INR' etc

            $table->enum('pricing_type', ['one_time', 'subscription'])->default('one_time');

            $table->date('start_date')->nullable(); // Discount/offer start
            $table->date('end_date')->nullable();   // Discount/offer end

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
        Schema::dropIfExists('course_prices');
    }
};
