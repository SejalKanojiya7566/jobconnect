<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('resume');
            $table->string('status')->default('Pending');
            $table->timestamps();

            // Foreign key
            $table->foreign('job_id')
                  ->references('id')
                  ->on('jobs')
                  ->onDelete('cascade');

            //  PREVENT SAME EMAIL APPLYING SAME JOB AGAIN
            $table->unique(['job_id', 'email']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};