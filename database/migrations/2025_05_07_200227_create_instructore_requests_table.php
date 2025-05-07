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
        Schema::create('instructore_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('sourcing')->nullable();
            $table->string('category')->nullable();
            // Personal
            $table->string('last_education')->nullable();
            $table->string('location')->nullable();
            $table->integer('daily_available_hours')->nullable();

            // Teaching Experience
            $table->boolean('has_teaching_experience')->default(false);
            $table->text('experience_year')->nullable();
            $table->enum('preferred_student_level', ['beginner', 'intermediate', 'advanced'])->nullable();

            // Course Preparation
            $table->boolean('can_create_thumbnail')->default(false);
            $table->boolean('can_create_promo_video')->default(false);
            $table->boolean('has_course_module')->default(false);
            $table->boolean('has_course_video_upload')->default(false);
            $table->boolean('can_create_assignments')->default(false);

            // Technical Setup
            $table->string('able_tolive_class')->nullable();
            $table->boolean('has_webcam')->default(false);
            $table->boolean('can_use_video_call_tools')->default(false);

            // Communication
            $table->boolean('can_reply_within_24h')->default(false);
            $table->boolean('can_participate_community')->default(false);
            $table->boolean('available_for_live_qa')->default(false);

            // Ethics
            $table->boolean('no_copyright_violation')->default(true);
            $table->boolean('accepts_review_policy')->default(true);
            $table->boolean('agrees_to_terms')->default(true);

            // Social & Marketing
            $table->boolean('willing_to_promote_course')->default(false);
            $table->boolean('interested_in_affiliate')->default(false);
            $table->boolean('plans_more_courses')->default(false);

            // Self-Motivation
            $table->text('why_become_instructor')->nullable();
            $table->text('future_contribution_plan')->nullable();
            $table->text('what_makes_you_unique')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructore_requests');
    }
};
