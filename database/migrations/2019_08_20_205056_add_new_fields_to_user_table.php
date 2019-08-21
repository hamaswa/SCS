<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewFieldsToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string("bank")->default("");
            $table->string("bank_name")->default("");
            $table->string("account_no")->default("");
            $table->boolean("PCE")->default(false);
            $table->boolean("CEILI")->default(false);
            $table->boolean("REN")->default(false);
            $table->string("scheme")->default("Agent");
            $table->string("salary")->default("2000");
            $table->string("code")->default("PG");
            $table->string("area")->default("KL");
//            $table->string()->default("");
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
