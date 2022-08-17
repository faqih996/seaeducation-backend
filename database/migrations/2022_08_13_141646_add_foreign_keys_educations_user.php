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
        Schema::table('educations_user', function (Blueprint $table) {
            $table->foreign('detail_user_id', 'fk_educations_to_detail_users')->references('id')
            ->on('detail_user_id')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('educations_user', function (Blueprint $table) {
            $table->dropForeign('fk_educations_to_detail_users');
        });
    }
};
