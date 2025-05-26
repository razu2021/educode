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
            $table->string('daily_available_hours')->nullable();

            // Teaching Experience
            $table->string('has_teaching_experience')->nullable();
            $table->text('experience_year')->nullable();
            $table->string('preferred_student_level')->nullable();

            // Course Preparation
            $table->string('can_create_thumbnail')->nullable();
            $table->string('can_create_promo_video')->nullable();
            $table->string('has_course_module')->nullable();
            $table->string('has_course_video_upload')->nullable();
            $table->string('can_create_assignments')->nullable();

            // Technical Setup
            $table->string('able_tolive_class')->nullable();
            $table->string('has_webcam')->nullable();
            $table->string('can_use_video_call_tools')->nullable();

            // Communication
            $table->string('can_reply_within_24h')->nullable();
            $table->string('can_participate_community')->nullable();
            $table->string('available_for_live_qa')->nullable();

            // Ethics
            $table->string('no_copyright_violation')->nullable();
            $table->string('accepts_review_policy')->nullable();
           

            // Social & Marketing
            $table->string('willing_to_promote_course')->nullable();
            $table->string('interested_in_affiliate')->nullable();
            $table->string('plans_more_courses')->nullable();

            // Self-Motivation
            $table->text('why_become_instructor')->nullable();
            $table->text('future_contribution_plan')->nullable();
            $table->text('what_makes_you_unique')->nullable();
             $table->string('agrees_to_terms')->nullable();
             $table->integer('approval_status')->default(0);
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
