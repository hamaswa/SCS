<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantData extends Model
{
    protected $table = "applicant_data";
    protected $fillable = [
        'aacategory','aabranch','aasource','aaprogramcode','serial_no','name','unique_id','mobile','consent','status','user_id'
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


    public function applicantApplicants(){
        return $this->hasOne("App\Applicant_ApplicantData",'applicant_id');
    }

    public  function applicantComments(){
        return $this->hasMany("App\ApplicantComments",'applicant_id');
    }

    public function applicantDocuments(){
        return $this->hasMany("App\ApplicantDocuments",'applicant_id');
    }

    public  function applicantBusinesses(){
        return $this->hasMany("App\ApplicantBusiness",'applicant_id');
    }

//    public function LA_AAs(){
//        return $this->belongsToMany("App\Maker\LoanApplication",'loan_applications');
//    }
}
