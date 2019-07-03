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
            $table->string('serial_no')->nullable();
            $table->string('aacategory')->nullable();
            $table->string('aabranch')->nullable();
            $table->string('aasource')->nullable();
            $table->string('aaallocation')->nullable();
            $table->string("name")->nullable();
            $table->string("unique_id")->unique();
            $table->string("mobile")->nullable();
            $table->string("consent")->nullable();
            $table->string("status")->default("Application");
            $table->timestamps();
        });

        Schema::create('applicant_income', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("gross")->nullable();
            $table->integer("net")->nullable();
            $table->text("form_data")->nullable();
            $table->bigInteger("applicant_id")->unsigned();
            $table->foreign("applicant_id")->references('id')->on('applicant_data')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('applicant_wealth', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("total");
            $table->text("form_data")->nullable();
            $table->bigInteger("applicant_id")->unsigned();
            $table->foreign("applicant_id")->references('id')->on('applicant_data')->onDelete('cascade');
            $table->timestamps();
        });


        Schema::create('applicant_property', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('property_type')->nullable();
            $table->string('property_master_individual')->nullable();
            $table->string('property_market_value')->nullable();
            $table->string('property_labu')->nullable();
            $table->string('property_owner_type')->nullable();
            $table->string('property_owner')->nullable();
            $table->string('property_storey')->nullable();
            $table->string('property_loan_outstanding')->nullable();
            $table->string('property_reno_cost')->nullable();
            $table->string('property_bank')->nullable();
            $table->string('property_address')->nullable();
            $table->string("MV")->nullable();
            $table->string("OS")->nullable();
            $table->string("CO")->nullable();
            $table->text("form_data")->nullable();

            $table->bigInteger("applicant_id")->unsigned();
            $table->foreign("applicant_id")->references('id')->on('applicant_data')->onDelete('cascade');
            $table->timestamps();

        });

        Schema::create('facility_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type')->default("");
            $table->string("csris")->default("");
            $table->string("facilitydate")->nullable();
            $table->string("capacity")->nullable();
            $table->string('facilitylimit')->nullable();
            $table->string('facilityoutstanding')->nullable();
            $table->string("installment")->nullable();
            $table->string("mia")->nullable();
            $table->string("conduct")->nullable();
            $table->bigInteger("applicant_id")->unsigned();
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
        Schema::dropIfExists('applicant_income');
        Schema::dropIfExists('applicant_wealth');
        Schema::dropIfExists('applicant_property');
        Schema::dropIfExists('facility_infos');
        Schema::dropIfExists('applicant_data');
    }
}
