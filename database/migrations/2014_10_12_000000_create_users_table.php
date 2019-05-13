<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('altemail')->default("");
            $table->timestamp('email_verified_at')->nullable();
            $table->string('mobile')->default("");
            $table->string('address')->default("");
            $table->boolean('status')->default("0");
            $table->string("country")->default("");
            $table->string('password')->default("");
            $table->string('memberid')->default("");
            $table->integer('type')->default("0");
            $table->string("enabletelemarkaccess")->default("");
            $table->string('uplineid')->default("");
            $table->string('bankgroup')->default("");
            $table->string('nric')->default("");
            $table->string('postcode')->default("");
            $table->string('city')->default("");
            $table->string('state')->default("");
            $table->string('insuranceid')->default("");
            $table->string('bankpayee')->default("");
            $table->string('bankaccount')->default("");
            $table->string('banktype')->default("");
            $table->date('dob')->nullable(true);
            $table->integer("rankid")->default('0');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
