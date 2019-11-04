<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToFacilityInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('facility_infos', function (Blueprint $table) {
            $table->char("sts", 50);
            $table->char("col_type", 50);
            $table->string("adverse_remark");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

}
