<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("aasource_id")->unsigned();
            $table->integer("aabranch_id")->unsigned();
            $table->integer("aacategory_id")->unsigned();
            $table->integer("aatype_id")->unsigned();
            $table->timestamp("date")->nullable();
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
        Schema::dropIfExists('application_accounts');
    }
}
