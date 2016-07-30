<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerAsk extends Model
{
    protected $table = 'CustomerAsks';

    protected $primaryKey = 'Id';

    public $timestamps = false;

    public static function rules()
    {
        $rules = array(
            'CustomerId'    => 'require',
            'AskDate'       => 'require',
            'Description'   => 'require',
            'ConfirmDate'   => 'require'
        );

        return $rules;
    }

    public static $CANCEL = 0;

    public static $WAITING = 1;

    public static $SUCCESS = 2;
}
