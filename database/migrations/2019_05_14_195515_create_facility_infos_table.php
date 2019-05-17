<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilityInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type')->default("");
            $table->string("csris")->default("");
            $table->date("facilitydate")->nullable();
            $table->string("capacity")->nullable();
            $table->bigInteger('facilitylimit')->nullable();
            $table->bigInteger('facilityoutstanding')->nullable();
            $table->integer("installment")->nullable();
            $table->integer("mia")->nullable();
            $table->integer("conduct");
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
        Schema::dropIfExists('facility_infos');
    }
}
