<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacilityInfo extends Model
{
    protected  $fillable = ['type','csris','capacity','facilitylimit','facilityoutstanding','installment','mia','conduct'];
}
