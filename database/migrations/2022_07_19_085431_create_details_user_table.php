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
        Schema::create('details_user', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->foreignId('users_id')->nullable()->index('fk_details_user_to_users');
            $table->string('birth_place')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital')->nullable();
            $table->string('about_me')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('phone_number2')->nullable();
            $table->longText('address')->nullable();
            $table->string('regency')->nullable();
            $table->string('province')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('country')->nullable();
            $table->string('skype')->nullable();

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
        Schema::dropIfExists('detail_user');
    }
};
