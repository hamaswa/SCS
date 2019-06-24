<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantData extends Model
{
    protected $table = "applicant_data";
    protected $fillable = [
        'aacategory','name','unique_id','mobile'
    ];
}
