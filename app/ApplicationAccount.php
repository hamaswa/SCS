<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationAccount extends Model
{
    protected $fillable = [
        'aasource_id','aabranch_id','aacategory_id','aatype_id','date','status','user_id'
    ];
}
