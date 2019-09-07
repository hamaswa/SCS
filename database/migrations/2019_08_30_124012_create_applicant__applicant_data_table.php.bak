<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantApplicantDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant__applicant_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name")->nullable();
            $table->string("unique_id")->nullable();
            $table->string("email")->nullable();
            $table->string("mobile")->nullable();
            $table->string("salutation")->nullable();
            $table->string("position")->nullable();
            $table->string("ownership")->nullable();
            $table->string("nature_of_business")->nullable();
            $table->string("date_established")->nullable();
            $table->string("address")->nullable();
            $table->string("aacategory")->nullable();
            $table->bigInteger("applicant_id")->unsigned();
            $table->integer("user_id")->unsigned();
            $table->foreign("user_id")
                ->references('id')
                ->on('users');
            $table->foreign("applicant_id")
                ->references('id')
                ->on('applicant_data')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('applicant__applicant_data');
    }
}
