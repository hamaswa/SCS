<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('aacategory');
            $table->string("name")->nullable();
            $table->string("uniqueid")->unique();
            $table->string("mobile")->nullable();
            $table->string("consent")->nullable();
            $table->timestamps();
        });

        Schema::create('applicant_monthly_income', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('type');
            $table->integer("gross")->nullable();
            $table->integer("net")->nullable();
            $table->text("form_data");
            $table->string("applicant_id")->unsigned();
            $table->foreign("applicant_id")->references('id')->on('applicant_data')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('applicant_monthly_wealth', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('type');
            $table->integer("amount");
            $table->text("form_data");
            $table->string("applicant_id")->unsigned();
            $table->foreign("applicant_id")->references('id')->on('applicant_data')->onDelete('cascade');
            $table->timestamps();
        });


        Schema::create('applicant_wealth', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('type');
            $table->integer("amount");
            $table->string("applicant_id")->unsigned();
            $table->text("form_data");
            $table->foreign("applicant_id")->references('id')->on('applicant_data')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('applicant_property', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('p_type');
            $table->integer("MV");
            $table->integer("OS");
            $table->integer("CO");
            $table->integer("type");
            $table->integer("storey");
            $table->integer("owners");
            $table->integer("bank");
            $table->integer("renocost");
            $table->text("renovation_details");
            $table->string("address");
            $table->string("applicant_id")->unsigned();
            $table->foreign("applicant_id")->references('id')->on('applicant_data')->onDelete('cascade');
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
        Schema::dropIfExists('applicant_data');
    }
}
