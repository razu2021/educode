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

        $table->unsignedBigInteger('course_id')->nullable();
        $table->unsignedBigInteger('user_id')->nullable();

        $table->string('payment_gateway')->nullable(); // stripe, sslcommerz, paypal
        $table->string('payment_id')->nullable();      // Stripe/Paypal payment ID
        $table->string('tran_id')->nullable();         // Transaction ID
        $table->string('val_id')->nullable();          // SSLCommerz validation ID
        $table->string('invoice_id')->nullable();      // Internal invoice tracking

        $table->string('currency', 10)->default('BDT');
        $table->decimal('amount', 10, 2);
        $table->decimal('store_amount', 10, 2)->nullable();

        $table->enum('payment_status', ['PENDING', 'VALID', 'FAILED', 'CANCELLED'])->default('PENDING');
        $table->enum('payment_mode', ['online', 'offline', 'wallet'])->default('online');

        // Card & bank info
        $table->string('card_type')->nullable();        // Visa, MasterCard
        $table->string('card_brand')->nullable();       // Classic, Platinum
        $table->string('card_issuer')->nullable();      // BRAC, DBBL
        $table->string('card_no')->nullable();          // masked

        $table->string('bank_tran_id')->nullable();     // Bank transaction ID (SSLCommerz)
        $table->longText('verify_sign')->nullable();      // SSLCommerz verify sign
        $table->longText('verify_sign_sha2')->nullable(); // SHA2 hash
        $table->longText('verify_key')->nullable();       // Key for verification
        $table->string('risk_title')->nullable();       // Risk status
        $table->string('risk_level')->nullable();       // 0 (safe), >0 risky

        // Refund support
        $table->boolean('is_refunded')->default(false);
        $table->decimal('refunded_amount', 10, 2)->nullable();
        $table->timestamp('refund_date')->nullable();

        // Timestamps
        $table->timestamp('payment_date')->nullable();  // Actual payment confirmation time
        $table->ipAddress('ip_address')->nullable();
        $table->string('user_agent')->nullable();

        // Payload & Status
        $table->text('payload')->nullable(); // Full response store (JSON/string)
        $table->integer('status')->default(1);
        $table->integer('public_status')->default(0);

        $table->timestamps();
        $table->softDeletes();

        // Foreign Keys
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
