<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserContacts extends Model
{
    protected $fillable = [
        'group_id','email','phone'
    ];
}
