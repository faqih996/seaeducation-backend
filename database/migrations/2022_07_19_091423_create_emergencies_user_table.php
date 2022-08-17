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
        Schema::create('emergencies_user', function (Blueprint $table) {
            $table->id();
            $table->string('family_name')->nullable();
            $table->string('relations')->nullable();
            $table->foreignId('detail_user_id')->nullable()->index('fk_emergencies_to_detail_users');
            $table->string('contact1')->nullable();
            $table->string('contact2')->nullable();
            $table->string('email')->nullable();
            $table->longText('address')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('country')->nullable();
            $table->string('zip_code')->nullable();

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
        Schema::dropIfExists('emergency_user');
    }
};
