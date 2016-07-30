<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    protected $table = 'Imports';

    protected $primaryKey = 'Id';

    public $timestamps = false;

    public static function rules()
    {
        $rules = array(
            'ImportDate'    => 'required',
            'SupplierId'    => 'required',
            'ItemId'        => 'required',
            'Quantity'      => 'required',
            'SalePrice'     => 'required'
        );

        return $rules;
    }
}
