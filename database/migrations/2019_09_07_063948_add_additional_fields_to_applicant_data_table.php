<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdditionalFieldsToApplicantDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applicant_data', function (Blueprint $table) {
            $table->string("email")->nullable();
            $table->string("salutation")->nullable();
            $table->string("position")->nullable();
            $table->string("ownership")->nullable();
            $table->string("nature_of_business")->nullable();
            $table->string("date_established")->nullable();
            $table->string("address")->nullable();
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
