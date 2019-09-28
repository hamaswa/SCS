<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToApplicantWealth extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applicant_wealth', function (Blueprint $table) {
            $table->string("type")->nullable();
            $table->integer("gross")->nullable();
        });
    }


}
