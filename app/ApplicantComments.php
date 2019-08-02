<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ApplicantData;

class ApplicantComments extends Model
{

    protected $fillable = [
        'applicant_id','comments','user_id'
    ];

}
