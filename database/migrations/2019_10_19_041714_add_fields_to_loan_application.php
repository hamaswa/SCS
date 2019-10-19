<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToLoanApplication extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('loan_applications', function (Blueprint $table) {
            $table->integer("user_id")->nullable();
            $table->string("la_serial_no")->nullable();
            $table->string("la_serial_id")->nullable();
            $table->string("la_type")->nullable();
            $table->string("bank")->nullable();
            $table->integer("loan_amount")->nullable();
            $table->string("status")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('loan_applications', function (Blueprint $table) {
            //
        });
    }
}
