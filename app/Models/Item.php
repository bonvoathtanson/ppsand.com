<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Item extends Model
{
    protected $table = 'Items';
    protected $primaryKey = 'Id';
    public $timestamps = false;
}
