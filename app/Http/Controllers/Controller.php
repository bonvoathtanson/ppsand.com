<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        $this->middleware('auth');
    }
    protected $Results = array(
      'IsError' => false,
      'Message' => '',
      'Data' => ''
    );

    protected function SetError($iserror){
      $this->Results['IsError'] = $iserror;
    }

    protected function SetMessage($message){
      $this->Results['Message'] = $message;
    }

    protected function SetData($data){
        $this->Results['Data'] = $data;
    }
}
