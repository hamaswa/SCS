<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantIncome extends Model
{
    protected $table = "applicant_income";

    protected $fillable = [
        'type','gross','net','applicant_id','user_id'
    ];

    protected $attributes = [
        'form_data'=> '{"_token":"","formname":"incomeform","income_id":null,"incometype":"salary","monthly_fixed_currency":"myr","monthly_fixed_exchance_rate":"1","monthly_fixed_basic":"0","monthlyfixedadded":"true","monthly_variable_currency":"myr","monthly_variable_exchange_rate":"1","month1_variable_basic":null,"month2_variable_basic":null,"month3_variable_basic":null,"month4_variable_basic":null,"month5_variable_basic":null,"month6_variable_basic":null,"monthlyvariableadded":"false","annual_tax_declared_currency":"myr","annual_tax_declared_exchance_rate":"1","annual_tax_declared_amount":null,"annualtaxdeclaredadded":"false","month1_iif":null,"month2_iif":null,"month3_iif":null,"month4_iif":null,"month5_iif":null,"month6_iif":null,"iif_income_factor":null,"iif_share_holding":null,"monthly_rental_amount":null,"monthly_rental_added":"false","annual_investment_return_currency":"myr","annual_investment_return_exchange_rate":"0","annual_investment_return_amount":null,"annual_investment_return_added":"false","monthly_fixed_gross":"0","monthly_fixed_net":"0","monthly_variable_gross":"0","monthly_variable_net":"0","annual_tax_declared_gross":"0","annual_tax_declared_net":"0","annual_investment_return_gross":"0","annual_investment_return_net":"0","monthly_rental_gross":"0","monthly_rental_net":"0","iif_gross":"0","iif_net":"0","gross":"0","net":"0"}',

    ];

}
