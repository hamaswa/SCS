<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'slug','name'
    ];

    public function users() {
        return $this->hasMany(Users::class,"position_id");
    }
}
