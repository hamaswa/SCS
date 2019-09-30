<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('serial_no')->nullable();
            $table->string('aacategory')->nullable();
            $table->string('aabranch')->nullable();
            $table->string('aasource')->nullable();
            $table->string('aaprogramcode')->nullable();
            $table->string("unique_id")->unique();
            $table->string("name")->nullable();
            $table->string("mobile")->nullable();
            $table->string("consent")->default("0");
            $table->string("status")->default("Appointment");
            $table->string("list_status")->default("0");
            $table->integer("user_id")->unsigned();
            $table->foreign("user_id")
                ->references('id')
                ->on('users');
            $table->timestamps();
        });

        Schema::create('applicant_businesses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("business_type")->nullable();
            $table->string("business_shareholding")->nullable();
            $table->string("business_turnover")->nullable();
            $table->string("business_nature")->nullable();
            $table->string("business_position")->nullable();
            $table->string("business_email")->nullable();
            $table->bigInteger("applicant_id")->unsigned();
            $table->integer("user_id")->unsigned();
            $table->foreign("user_id")
                ->references('id')
                ->on('users');
            $table->foreign("applicant_id")
                ->references('id')
                ->on('applicant_data')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('applicant_income', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("gross")->nullable();
            $table->integer("net")->nullable();
            $table->text("form_data")->nullable();//
            //{"_token":"","formname":"incomeform","income_id":null,"incometype":"salary","monthly_fixed_currency":"myr","monthly_fixed_exchance_rate":"1","monthly_fixed_basic":"0","monthlyfixedadded":"true","monthly_variable_currency":"myr","monthly_variable_exchange_rate":"1","month1_variable_basic":null,"month2_variable_basic":null,"month3_variable_basic":null,"month4_variable_basic":null,"month5_variable_basic":null,"month6_variable_basic":null,"monthlyvariableadded":"false","annual_tax_declared_currency":"myr","annual_tax_declared_exchance_rate":"1","annual_tax_declared_amount":null,"annualtaxdeclaredadded":"false","month1_iif":null,"month2_iif":null,"month3_iif":null,"month4_iif":null,"month5_iif":null,"month6_iif":null,"iif_income_factor":null,"iif_share_holding":null,"monthly_rental_amount":null,"monthly_rental_added":"false","annual_investment_return_currency":"myr","annual_investment_return_exchange_rate":"0","annual_investment_return_amount":null,"annual_investment_return_added":"false","monthly_fixed_gross":"0","monthly_fixed_net":"0","monthly_variable_gross":"0","monthly_variable_net":"0","annual_tax_declared_gross":"0","annual_tax_declared_net":"0","annual_investment_return_gross":"0","annual_investment_return_net":"0","monthly_rental_gross":"0","monthly_rental_net":"0","iif_gross":"0","iif_net":"0","gross":"0","net":"0"}');
            $table->integer("user_id")->unsigned();
            $table->foreign("user_id")
                ->references('id')
                ->on('users');
            $table->bigInteger("applicant_id")->unsigned();
            $table->foreign("applicant_id")
                ->references('id')
                ->on('applicant_data')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::create('applicant_wealth', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("total");
            $table->text("form_data")->nullable();
            $table->integer("user_id")->unsigned();
            $table->foreign("user_id")
                ->references('id')
                ->on('users');
            $table->bigInteger("applicant_id")->unsigned();
            $table->foreign("applicant_id")
                ->references('id')
                ->on('applicant_data')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });


        Schema::create('applicant_property', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('property_type')->nullable();
            $table->string('property_master_individual')->nullable();
            $table->string('property_market_value')->nullable();
            $table->string('property_labu')->nullable();
            $table->string('property_owner_type')->nullable();
            $table->string('property_owner')->nullable();
            $table->string('property_storey')->nullable();
            $table->string('property_loan_outstanding')->nullable();
            $table->string('property_reno_cost')->nullable();
            $table->string('property_bank')->nullable();
            $table->string('property_address')->nullable();
            $table->string("MV")->nullable();
            $table->string("OS")->nullable();
            $table->string("CO")->nullable();
            $table->text("form_data")->nullable();
            $table->integer("user_id")->unsigned();
            $table->foreign("user_id")
                ->references('id')
                ->on('users');
            $table->bigInteger("applicant_id")->unsigned();
            $table->foreign("applicant_id")
                ->references('id')
                ->on('applicant_data')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();

        });

        Schema::create('facility_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type')->default("");
            $table->string("csris")->default("");
            $table->string("facilitydate")->nullable();
            $table->string("capacity")->nullable();
            $table->string('facilitylimit')->nullable();
            $table->string('facilityoutstanding')->nullable();
            $table->string("installment")->nullable();
            $table->string("mia")->nullable();
            $table->string("conduct")->nullable();
            $table->integer("user_id")->unsigned();
            $table->foreign("user_id")
                ->references('id')
                ->on('users');
            $table->bigInteger("applicant_id")->unsigned();
            $table->foreign("applicant_id")
                ->references('id')
                ->on('applicant_data')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('applicant_income');
        Schema::dropIfExists('applicant_wealth');
        Schema::dropIfExists('applicant_property');
        Schema::dropIfExists('facility_infos');
        Schema::dropIfExists('applicant_businesses');
        Schema::dropIfExists('applicant_data');
    }
}
