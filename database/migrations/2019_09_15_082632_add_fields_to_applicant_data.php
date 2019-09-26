<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToApplicantData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applicant_data', function (Blueprint $table) {
            $table->date("date_joined")->nullable();
            $table->string("office_address")->nullable();
            $table->string("office_phone_no")->nullable();
            $table->string("aa_company_name")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applicant_data', function (Blueprint $table) {
            //
        });
    }
}
