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
        Schema::create('documents_med_user', function (Blueprint $table) {
            $table->id();
            $table->string('doc_name')->nullable();
            $table->string('clinic_name')->nullable();
            $table->string('slug')->nullable();
            $table->foreignId('user_id')->nullable()->index('fk_documents_med_user_to_users');
            $table->string('place_issued')->nullable();
            $table->date('issued_date')->nullable();
            $table->date('expired_date')->nullable();
            $table->boolean('docs_status')->default(false);
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
        Schema::dropIfExists('documents_med_user');
    }
};