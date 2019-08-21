<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Permissions\HasPermissionsTrait;

class User extends Authenticatable
{
    use Notifiable,HasPermissionsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'username','mobile','address','status', 'email', 'password',
        'position_id','parent_id',
        'country','state','city','zipcode',
        'bank','bank_name','account_no',
        'PCE','CEILI','REN','scheme',
        'salary','code','area','status'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Position(){
        return $this->belongsTo(Position::class);
    }

    public function Applicants(){
        return $this->hasMany("App\ApplicantData","user_id");
    }

    public function parent(){
        return $this->belongsTo(User::class);
    }

    public function childs() {
        return $this->hasMany('App\User','parent_id','id') ;
    }

    public function contacts(){
        return $this->hasMany('App\UserContacts','user_id');
    }

    public function childrenRecursive()
    {
        return $this->childs()->with('childrenRecursive');
        // which is equivalent to:
        // return $this->hasMany('Survey', 'parent')->with('childrenRecursive);
    }
}
