<?php

namespace App\Http\Controllers;
use App\Models\Sale;
use App\Models\CustomerAsk;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function notification()
    {
        $customerask = CustomerAsk::where('StatusId', '=', CustomerAsk::WAITING)->count();

        $timetransfer = Sale::where('IsOrder', '=', 1)
                    ->where('TransferDate', '<=', date('Y-m-d H:i:s'))
                    ->count();

        $transfer = Sale::where('IsOrder', '=', 1)->count();

        $response = array(
            'timetransfer'  => $timetransfer,
            'customerask'   => $customerask,
            'transfer'      => $transfer
        );
        $this->SetData($response);

        return response()->json($this->Results);
    }
}
