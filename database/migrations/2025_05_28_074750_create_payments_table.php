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
        $table->unsignedBigInteger('plan_id')->nullable(); // ✅ match with bigIncrements
        $table->unsignedBigInteger('user_id')->nullable(); // ✅ for users table
        $table->string('payment_gateway')->nullable(); // stripe
        $table->string('payment_id')->nullable();
        $table->string('currency')->default('USD');
        $table->decimal('amount', 10, 2);
        $table->integer('status')->default(1);
        $table->integer('public_status')->default(0);
        $table->text('payload')->nullable();
        $table->timestamps();
        $table->softDeletes();
        $table->foreign('plan_id')->references('id')->on('subscription_plans')->onDelete('cascade');
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
