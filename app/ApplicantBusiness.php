<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantBusiness extends Model
{
    protected $fillable = [
        'applicant_id','business_type','business_shareholding',
        'business_turnover','business_nature','business_position',
        'business_email','user_id',
        'bussiness_company_name', 'bussiness_date_established', 'bussiness_office_phone_no','bussiness_office_address'
    ];
}
