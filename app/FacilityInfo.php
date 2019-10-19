<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacilityInfo extends Model
{
    protected  $fillable = [
        'applicant_id','type','csris','capacity','facilitylimit','facilityoutstanding',
        'installment','mia','conduct','user_id',
        'loan_tenure','interest_rate','loan_amount','la_id','status'
    ];
}
