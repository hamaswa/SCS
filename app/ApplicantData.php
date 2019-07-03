<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantData extends Model
{
    protected $table = "applicant_data";
    protected $fillable = [
        'aacategory','aabranch','aasource','aaallocation','serial_no','name','unique_id','mobile'
    ];

    public function facilityInfo(){
        return $this->hasMany('App\FacilityInfo', 'applicant_id');
    }

    public function applicantIncome(){
        return $this->hasOne("App\ApplicantIncome",'applicant_id');
    }


    public function applicantWealth(){
        return $this->hasOne("App\ApplicantWealth",'applicant_id');
    }


    public function applicantProperty(){
        return $this->hasMany("App\ApplicantProperty",'applicant_id');
    }
}
