<?php

namespace App\maker;

use Illuminate\Database\Eloquent\Model;

class LoanApplication extends Model
{
    //
    protected $fillable = [
        'la_applicant_id',
        'applicant_id',
    ];


    public function LA_AAs(){
        return $this->hasMany("App\ApplicantData","id",'applicant_id');
    }
}
