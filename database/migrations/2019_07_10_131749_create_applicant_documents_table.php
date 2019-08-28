<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("file_name");
            $table->string("doc_name");
            $table->string("doc_type")->nullable();
            $table->string("doc_hint")->nullable();
            $table->string("doc_status")->default("Mandatory");
            $table->integer("user_id")->unsigned();
            $table->foreign("user_id")
                ->references('id')
                ->on('users');
            $table->bigInteger("applicant_id")->unsigned();
            $table->foreign("applicant_id")
                ->references('id')
                ->on('applicant_data')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('applicant_documents');
    }
}
