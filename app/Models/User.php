<?php

namespace Chatty\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Auth\Passwords\CanResetPassword;
//use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
//use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
//use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract/*,
                                    AuthorizableContract,
                                    CanResetPasswordContract*/
{
    use Authenticatable/*, Authorizable, CanResetPassword*/;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'first_name',
        'last_name',
        'location',
    ];
    /*protected $fillable = [
            'email',
            'username',
            'password',
            'first_name',
        'last_name',
        'location',
        'remember_token'
        ];*/
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];


    public function getName(){
        if($this->first_name && $this->last_name){
            return $this->first_name." ".$this->last_name;
        }
        if($this->first_name){
            return $this->first_name;
        }
        if($this->last_name){
            return $last_name;
        }
        return null;
    }

    public function getNameOrUsername(){
        return $this->getName() ?: $this->username;
    }

    public function getFirstNameOrUsername(){
        return $this->first_name ?: $this->username;
    }

    public function getAvatarUrl(){
        return "https://www.gravatar.com/avatar/{{ md5($this->email}}?d=mm&s=40";
    }
}
