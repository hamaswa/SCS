<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserContacts extends Model
{
    protected $fillable = [
        'group_id','user_id','email','phone'
    ];
}
