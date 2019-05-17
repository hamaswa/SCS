<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AASource extends Model
{
    protected $fillable = [
        'name','description','status','type'
    ];
}
