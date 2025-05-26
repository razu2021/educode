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
        Schema::create('payment_gateways', function (Blueprint $table) {
            $table->bigIncrements('id');
        
            // Type & Name of the gateway
            $table->string('gateway_type')->nullable(); // e.g., local, third_party, international
            $table->string('gateway_name')->nullable(); // e.g., bkash, stripe, sslcommerz
        
            // Common Credentials
            $table->longText('api_key')->nullable();
            $table->longText('api_secret')->nullable();
            $table->longText('client_id')->nullable();
            $table->longText('client_secret')->nullable();
            $table->longText('webhook_secret')->nullable();
        
            // Local Gateway (e.g., bKash, Nagad)
            $table->longText('merchant_id')->nullable();
            $table->longText('username')->nullable();
            $table->longText('password')->nullable();
        
            // 3rd Party Gateway (e.g., SSLCommerz)
            $table->longText('store_id')->nullable();
            $table->longText('store_password')->nullable();
        
            // Token & Meta
            $table->longText('access_token')->nullable();
            $table->string('slug', 255)->nullable();
            $table->unsignedBigInteger('creator_id')->nullable();
            $table->unsignedBigInteger('editor_id')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('public_status')->default(0);
            
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_gateways');
    }
};
