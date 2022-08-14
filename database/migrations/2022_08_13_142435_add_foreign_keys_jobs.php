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
        Schema::table('jobs', function (Blueprint $table) {
            $table->foreign('users_id', 'fk_jobs_to_users')->references('id')
            ->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');

            $table->foreign('departments_id', 'fk_jobs_to_departments')->references('id')
            ->on('departments')->onUpdate('CASCADE')->onDelete('CASCADE');

            $table->foreign('positions_id', 'fk_jobs_to_positions')->references('id')
            ->on('positions')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs_table', function (Blueprint $table) {
            $table->dropForeign('fk_jobs_to_users');
            $table->dropForeign('fk_jobs_to_departments');
            $table->dropForeign('fk_jobs_to_positions');
        });
    }
};
