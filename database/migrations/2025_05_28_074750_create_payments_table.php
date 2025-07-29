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
        Schema::create('payments', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('course_id')->nullable(); // ✅ match with bigIncrements
        $table->unsignedBigInteger('user_id')->nullable(); // ✅ for users table
        $table->string('payment_gateway')->nullable(); // stripe
        $table->string('payment_id')->nullable();
        $table->string('tran_id')->nullable();
        $table->string('val_id')->nullable();
        $table->string('currency')->default('BDT');
        $table->decimal('amount', 10, 2);
        $table->decimal('store_amount', 10, 2);
        $table->enum('payment_status', ['PENDING', 'VALID', 'FAILED', 'CANCELLED'])->default('PENDING');
        $table->integer('status')->default(1);
        $table->integer('public_status')->default(0);
        $table->text('payload')->nullable();
        $table->timestamps();
        $table->softDeletes();
        $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
