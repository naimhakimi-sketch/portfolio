<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Create the 'abouts' table
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('content');
            $table->string('profile_image')->nullable();
            $table->string('resume')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('github')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->timestamps();
        });

        // Create the 'educations' table
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('institution');
            $table->string('year_start');
            $table->string('year_end');
            $table->string('grade')->nullable();
            $table->longText('description');
            $table->string('logo')->nullable();
            $table->timestamps();
        });

        // Create the 'works' table
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->string('position');
            $table->string('company');
            $table->longText('description');
            $table->string('year_start');
            $table->string('year_end');
            $table->string('logo')->nullable();
            $table->timestamps();
        });

        // Create the 'certifications' table
        Schema::create('certifications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('issuing_organisation');
            $table->string('category');
            $table->string('issued');
            $table->string('expires')->nullable();
            $table->longText('description');
            $table->string('logo')->nullable();
            $table->timestamps();
        });

        // Create the 'skills' table
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('level');
            $table->string('image')->nullable();
            $table->string('category');
            $table->timestamps();
        });

        // Create the 'projects' table
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('short_description');
            $table->longText('full_description');
            $table->string('image')->nullable();
            $table->string('live_url')->nullable();
            $table->string('github_url')->nullable();
            $table->json('tech_stack');
            $table->string('project_type');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string('status');
            $table->timestamps();
        });

        // Create the 'contacts' table
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->longText('message');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('abouts');
        Schema::dropIfExists('educations');
        Schema::dropIfExists('works');
        Schema::dropIfExists('certifications');
        Schema::dropIfExists('skills');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('contacts');
    }
};