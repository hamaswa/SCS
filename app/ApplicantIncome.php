<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantIncome extends Model
{
    protected $table = "applicant_income";

    protected $fillable = [
        'type','sub_type','gross','net','applicant_id','user_id'
    ];

}
