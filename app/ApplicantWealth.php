<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantWealth extends Model
{
    protected $table = "applicant_wealth";

    protected  $fillable = [
        'total','form_data','applicant_id','user_id'
    ];

    protected $attributes = [
        'form_data'=> '{"_token":"","formname":"wealthform","wealth_id":null,"wealthtype":"saving","saving_amount":"","saving_added":"false","epf_amount":null,"epf_added":"false","tpf_amount":null,"tpf_added":"false","tsv_amount":null,"tsv_added":"false","utv_amount":null,"utv_added":"false","total":"0"}',
    ];
    //
}
