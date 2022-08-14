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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->foreignId('users_id')->nullable()->index('fk_jobs_to_users');
            $table->foreignId('departments_id')->nullable()->index('fk_jobs_to_departments');
            $table->foreignId('positions_id')->nullable()->index('fk_jobs_to_positions');
            $table->string('slug');
            $table->string('placement')->nullable();
            $table->string('detail')->nullable();
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
        Schema::dropIfExists('jobs');
    }
};
