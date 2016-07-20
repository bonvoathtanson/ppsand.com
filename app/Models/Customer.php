<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'Customers';
    protected $primaryKey = 'Id';
    public $timestamps = false;
}
