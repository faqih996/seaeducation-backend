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
        Schema::table('documents_pass_user', function (Blueprint $table) {
            $table->foreign('user_id', 'fk_documents_pass_user_to_users')->references('id')
            ->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documents_pass_user', function (Blueprint $table) {
            $table->dropForeign('fk_documents_pass_user_to_users');
        });
    }
};
