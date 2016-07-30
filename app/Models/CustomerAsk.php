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

    const $CANCEL = 0;

    const $WAITING = 1;

    const $SUCCESS = 2;
}
