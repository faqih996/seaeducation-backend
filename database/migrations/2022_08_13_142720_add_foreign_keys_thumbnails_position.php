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
        Schema::table('thumbnails_position', function (Blueprint $table) {
            $table->foreign('positions_id', 'fk_thumbnails_position_to_positions')->references('id')
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
        Schema::table('thumbnails_position', function (Blueprint $table) {
            $table->dropForeign('fk_thumbnails_position_to_positions');
        });
    }
};
