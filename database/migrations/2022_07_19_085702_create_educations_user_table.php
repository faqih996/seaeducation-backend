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
        Schema::create('educations_user', function (Blueprint $table) {
            $table->id();
            $table->string('edu_institution_name')->nullable();
            $table->string('slug')->nullable();
            $table->foreignId('details_user_id')->nullable()->index('fk_educations_to_details_user');
            $table->string('course')->nullable();
            $table->string('degree')->nullable();
            $table->date('start_date')->nullable();
            $table->date('graduate_date')->nullable();
            $table->longText('address')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('country')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('certificate')->nullable();

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
        Schema::dropIfExists('education_user');
    }
};
