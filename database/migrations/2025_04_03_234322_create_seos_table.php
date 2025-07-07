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
        Schema::create('seos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->unsignedBigInteger('unique_id')->nullable();
            $table->string('model_type')->nullable();
            // General SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('meta_robots')->nullable()->default('index, follow');
            $table->string('canonical_url')->nullable();
            $table->json('hreflang_tags')->nullable();
            $table->json('structured_data')->nullable();

            // Open Graph (Facebook, LinkedIn)
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_url')->nullable();
            $table->string('og_type')->nullable()->default('website');
            $table->string('og_locale')->nullable()->default('en_US');

            // Twitter Meta
            $table->string('twitter_card')->nullable()->default('summary_large_image');
            $table->string('twitter_title')->nullable();
            $table->text('twitter_description')->nullable();
            $table->string('twitter_site')->nullable();

            // Pinterest Meta
            $table->text('pinterest_description')->nullable();
            $table->string('pinterest_rich_pin')->nullable()->default('article');

            // WhatsApp & Messenger Meta
            $table->string('whatsapp_title')->nullable();
            $table->text('whatsapp_description')->nullable();
            $table->string('seo_image')->nullable();
            // Defualt 
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
        Schema::create('seos',function(Blueprint $table){
            $table->dropSoftDeletes();
        });
    }
};
