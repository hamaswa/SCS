<?php

namespace App\maker;

use Illuminate\Database\Eloquent\Model;

class LoanApplication extends Model
{
    //
    protected $fillable = [
        'la_applicant_id',
        'applicant_id',
        "user_id","la_serial_no","la_serial_id","la_type","bank","loan_amount","status"

    ];


    public function LA_AAs(){
        return $this->hasMany("App\ApplicantData","id",'applicant_id');
    }
}
