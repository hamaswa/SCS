<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacilityInfo extends Model
{
    protected  $fillable = [
        'applicant_id','type','csris','capacity',
        'facilitylimit','facilityoutstanding','facilitydate',
        'installment','mia','conduct','user_id',
        'loan_tenure', 'interest_rate', 'loan_amount', 'la_id', 'status',
        'sts', 'col_type', 'adverse_remark'
    ];
}
