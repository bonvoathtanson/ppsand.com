<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Name', 'Email', 'Password','DateCreated'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'Password', 'remember_token',
    ];

    public function getAuthPassword() {
      return $this->Password;
    }

    public function getRememberToken()
    {
      return '';
    }

    public function setRememberToken($value)
    {

    }

    public function getRememberTokenName()
    {
      return 'trash_attribute';
    }
}
