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
        Schema::create('documents_vaccin_user', function (Blueprint $table) {
            $table->id();
            $table->string('doc_name')->nullable();
            $table->string('slug')->nullable();
            $table->foreignId('users_id')->nullable()->index('fk_documents_to_users');
            $table->string('product_type')->nullable();
            $table->date('issued_date')->nullable();
            $table->string('docs_number')->nullable();
            $table->string('place_issued')->nullable();
            $table->string('country_issued')->nullable();
            $table->string('dose')->nullable();
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
        Schema::dropIfExists('documents_vaccin_user');
    }
};
