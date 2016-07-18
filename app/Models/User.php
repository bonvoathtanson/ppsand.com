<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
  use Authenticatable, CanResetPassword;

  protected $table = 'users';
  protected $primaryKey = 'Id';
  public $timestamps = false;
  protected $fillable = ['Name', 'Password', 'DateCreated'];
  protected $hidden = ['password', 'remember_token'];
}
