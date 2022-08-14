<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysApplyJobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('apply_jobs', function (Blueprint $table) {
            $table->foreign('employer_id', 'fk_employer_id_to_users')->references('id')
            ->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');

            $table->foreign('applicant_id', 'fk_applicant_id_to_users')->references('id')
            ->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');

            $table->foreign('jobs_id', 'fk_apply_jobs_to_jobs')->references('id')
            ->on('jobs')->onUpdate('CASCADE')->onDelete('CASCADE');

            $table->foreign('applicant_status_id', 'fk_apply_job_to_applicant_status')->references('id')
            ->on('applicant_status')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('apply_jobs', function (Blueprint $table) {
            $table->dropForeign('fk_employer_id_to_users');
            $table->dropForeign('fk_applicant_id_to_users');
            $table->dropForeign('fk_apply_jobs_to_jobs');
            $table->dropForeign('fk_apply_job_to_applicant_status');
        });
    }
}
