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
        Schema::table('emergencies_user', function (Blueprint $table) {
            $table->foreign('details_user_id', 'fk_emergencies_to_details_user')->references('id')
            ->on('details_user')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('emergencies_user', function (Blueprint $table) {
            $table->dropForeign('fk_emergencies_to_details_user');
        });
    }
};
