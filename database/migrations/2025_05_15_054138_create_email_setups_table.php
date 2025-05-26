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
        Schema::create('email_setups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mail_mailer')->nullable();
            $table->string('mail_host')->nullable();
            $table->string('mail_port')->nullable();
            $table->string('mail_username')->nullable();
            $table->string('mail_password')->nullable();
            $table->string('mail_encryption')->default('tls');
            $table->string('mail_from_address')->default('tls');
            $table->string('mail_from_name')->default('tls');
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
        Schema::dropIfExists('email_setups');
    }
};
