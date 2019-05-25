<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantData extends Model
{
    protected $fillable = [
        'name','uniqueid','mobile'
    ];
}
