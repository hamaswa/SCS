<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicantDocuments extends Model
{
    public $fillable = [
        'applicant_id','file_name','doc_name','doc_type','doc_status'
    ];
}
