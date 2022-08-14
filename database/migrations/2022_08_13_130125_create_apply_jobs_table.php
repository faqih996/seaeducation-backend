<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id')->nullable()->index('fk_employer_id_to_users');
            $table->foreignId('applicant_id')->nullable()->index('fk_applicant_id_to_users');
            $table->foreignId('jobs_id')->nullable()->index('fk_apply_job_to_job');
            $table->string('cv_docs')->nullable();
            $table->foreignId('applicant_status_id')->nullable()->index('fk_apply_job_to_applicant_status');
            $table->string('note')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apply_jobs');
    }
};
