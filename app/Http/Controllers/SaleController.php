<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Sale;
use App\Http\Requests;

class SaleController extends Controller
{
    public function index()
    {
        return view('sales.index');
    }

    public function search(){
        $sales = Sale::all();
        $sales->load(['Customer', 'Item']);
        $this->Results['Data'] = $sales;

        return response()->json($this->Results);
    }

    public function filter_customer()
    {
        return view('sales.filter_customer');
    }

    public function create($id)
    {
        $customer = Customer::find($id);
        $sales = Sale::where('CustomerId', '=', $id)->orderBy('SaleDate', 'DESC')->get();
        $transfers = Sale::where('CustomerId', '=', $id)
                        ->where('IsOrder', '=', 1)
                        ->orderBy('SaleDate', 'DESC')->get();

        $oncredits = Sale::where('CustomerId', '=', $id)
                        ->where('SubTotal', '>', DB::raw('PayAmount'))
                        ->orderBy('SaleDate', 'DESC')->get();

        $onpayoffs = Sale::where('CustomerId', '=', $id)
                        ->where('SubTotal', '<=', DB::raw('PayAmount'))
                        ->orderBy('SaleDate', 'DESC')->get();

        $results = array(
            'customer' => $customer,
            'transfers' => $transfers,
            'oncredits' => $oncredits,
            'onpayoffs' => $onpayoffs
        );
        return view('sales.create', $results);
    }

    public function store(Request $request)
    {
        $sale = new Sale();
        $sale->SaleDate = date_create($request->SaleDate);
        $sale->TransferDate = date_create($request->TransferDate);
        $sale->CustomerId = $request->CustomerId;
        $sale->ItemId = $request->ItemId;
        $sale->CarNumber = $request->CarNumber;
        $sale->Quantity = $request->Quantity;
        $sale->SalePrice = $request->SalePrice;
        $sale->DateCreated = date('Y-m-d H:i:s');
        $sale->SubTotal = $this->CalTotal($request->Quantity, $request->SalePrice);
        $sale->PayAmount = ($request->PayAmount == ''? 0 : $request->PayAmount);
        $sale->IsOrder = $request->IsOrder;
        $sale->save();

        return response()->json($this->Results);
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        //
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $rowAffect = Sale::find($id)->delete();
        if($rowAffect == 0)
        {
            $this->Results['IsError'] = true;
            $this->SetMessage('ការលុប​ទិន្នន័យមានបញ្ហាសូមព្យា​យាម​ម្តងទៀត');
        }

        return response()->json($this->Results);
    }

    private function CalTotal($quantity, $saleprice)
    {
        $qty = 0;
        $price = 0;
        if($quantity != "")
        {
            $qty = $quantity;
        }
        if($saleprice != "")
        {
            $price = $saleprice;
        }

        return ($qty * $price);
    }
}
