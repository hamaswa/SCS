<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantBusiness extends Model
{
    protected $fillable = [
        'applicant_id','business_type','business_shareholding','business_turnover','business_nature','business_position','business_email','user_id'
    ];
}
