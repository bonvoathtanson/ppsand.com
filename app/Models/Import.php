<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    protected $table = 'Imports';

    protected $primaryKey = 'Id';

    public $timestamps = false;

    public function Supplier()
    {
        return $this->belongsTo('App\Models\Supplier', 'SupplierId');
    }

    public function Item()
    {
        return $this->belongsTo('App\Models\Item', 'ItemId');
    }
}
