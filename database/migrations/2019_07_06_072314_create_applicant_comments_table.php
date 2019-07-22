<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("applicant_id")->unsigned();
           //$table->bigInteger("user_id")->unsigned();
            $table->text("comments")->nullable();

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
        Schema::dropIfExists('applicant_comments');
    }
}
