<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantWealth extends Model
{
    protected $table = "applicant_wealth";

    protected  $fillable = [
        'total','form_data','applicant_id','user_id',
        'gross','type'
    ];


}
