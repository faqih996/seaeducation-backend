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
        Schema::create('documents_stcw_user', function (Blueprint $table) {
            $table->id();
            $table->string('doc_name')->nullable();
            $table->string('training_type')->nullable();
            $table->string('training_facility')->nullable();
            $table->string('slug')->nullable();
            $table->foreignId('user_id')->nullable()->index('fk_documents_stcw_to_users');
            $table->string('place_issued')->nullable();
            $table->string('docs_number')->nullable();
            $table->date('issued_date')->nullable();
            $table->date('expired_date')->nullable();
            $table->string('docs_status')->nullable();
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
        Schema::dropIfExists('documents_stcw_user');
    }
};
