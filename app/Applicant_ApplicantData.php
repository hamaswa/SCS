<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant_ApplicantData extends Model
{
    protected $fillable = [
       "name","unique_id","email",
        "salutation","position",
        "nature_of_business","date_established",
        'mobile','ownership',
        "address","aacategory","applicant_id","user_id"
    ];
}
