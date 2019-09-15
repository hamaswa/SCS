<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantProperty extends Model
{
    protected $table = "applicant_property";

    protected $fillable = [
        'id',
        'property_type',
        'property_master_individual',
        'property_market_value',
        'property_labu',
        'property_owner_type',
        'property_owner',
        'property_storey',
        'property_loan_outstanding',
        'property_reno_cost',
        'property_bank',
        'property_address',
        'applicant_id',
        "MV",
        "OS",
        "CO",
        'user_id'
    ];

}
