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
        Schema::table('thumbnails_job', function (Blueprint $table) {
            $table->foreign('jobs_id', 'fk_thumbnails_jobs_to_users')->references('id')
            ->on('jobs')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('thumbnails_job', function (Blueprint $table) {
            $table->dropForeign('fk_jobs_to_users');
        });
    }
};
