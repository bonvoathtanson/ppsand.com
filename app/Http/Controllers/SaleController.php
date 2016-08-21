<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Sale;
use App\Models\Item;
use App\Models\CarNumber;
use App\Http\Requests;

class SaleController extends Controller
{
    public function index()
    {
        return view('sales.index');
    }

    public function transfer()
    {
        $sales = Sale::where('IsOrder', '=', 1)->get();
        $cars = CarNumber::all();
        return view('sales.transfer', ['sales' => $sales, 'cars' => $cars]);
    }

    public function timetransfer()
    {
        $sales = Sale::where('IsOrder', '=', 1)
                    ->where('TransferDate', '<=', date('Y-m-d H:i:s'))
                    ->get();
        $cars = CarNumber::all();

        return view('sales.transfer', ['sales' => $sales, 'cars' => $cars]);
    }

    public function search(){
        $sales = Sale::where('SubTotal', '>', DB::raw('PayAmount'))->get();
        $sales->load(['Customer', 'Item']);
        $this->Results['Data'] = $sales;

        return response()->json($this->Results);
    }

    public function filter_customer()
    {
        return view('sales.filter_customer');
    }

    public function updatetransfer(Request $request)
    {
        try {
            DB::beginTransaction();
            $id = $request->Id;
            $sale = Sale::find($id);
            $sale->CarNumber = $request->CarNumber;
            $sale->IsOrder = 0;
            $sale->save();
            $this->UpdateStock($sale->ItemId, $sale->Quantity);
            DB::commit();
        } catch (Exception $e) {
            $this->SetError(true);
            $this->SetMessage($e);
            DB::rollBack();
        }

        return response()->json($this->Results);
    }

    public function create($id)
    {
        $customer = Customer::find($id);
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
        try {
            DB::beginTransaction();
            $sale = new Sale();
            $sale->SaleCode = $this->GetSaleCode($request->CustomerId);
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
            if($request->IsOrder == "0")
            {
                $this->UpdateStock($request->ItemId, $request->Quantity);
            }
            DB::commit();
        } catch (Illuminate\Database\QueryException $e) {
            $this->SetError(true);
            $this->SetMessage($e);
            DB::rollBack();
        }

        return response()->json($this->Results);
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

    private function UpdateStock($itemId, $quantity)
    {
        $item = Item::find($itemId);
        $item->UnitInStock = ($item->UnitInStock - $quantity);
        $item->save();
    }

    private function GetSaleCode($customerId)
    {
        $number = Sale::where('CustomerId', '=', $customerId)->max('SaleCode');
        $number++;

        return $number;
    }
}
