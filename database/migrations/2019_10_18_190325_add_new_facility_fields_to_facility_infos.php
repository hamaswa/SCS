<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewFacilityFieldsToFacilityInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('facility_infos', function (Blueprint $table) {
             $table->integer("loan_tenure")->nullable();
            $table->float("interest_rate")->nullable();
            $table->integer("loan_amount")->nullable();
            $table->string("la_id")->nullable();
            $table->string("status")->default("cetos");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('facility_infos', function (Blueprint $table) {
            //
        });
    }
}
