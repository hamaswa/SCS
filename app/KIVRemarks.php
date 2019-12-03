<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KIVRemarks extends Model
{
    protected $fillable = [
        'la_applicant_id', 'applicant_id', 'remarks', 'kiv_category', 'user_id'
    ];
}
