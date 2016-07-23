<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
  protected $table = 'sales';

  protected $primaryKey = 'Id';

  public $timestamps = false;

  public function Customer()
  {
    return $this->belongsTo('App\Models\Customer', 'CustomerId');
  }

  public function Item()
  {
    return $this->belongsTo('App\Models\Item', 'ItemId');
  }
}
