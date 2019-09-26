<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBusinessOfficePhoneNo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applicant_businesses', function (Blueprint $table) {
            $table->char('bussiness_office_phone_no',255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applicant_businesses', function (Blueprint $table) {
            $table->dropColumn('bussiness_office_phone_no');
        });
    }
}
