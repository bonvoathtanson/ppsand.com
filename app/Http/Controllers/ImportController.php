<?php

namespace App\Http\Controllers;
use DB;
use Validator;
use App\Models\Supplier;
use App\Models\Import;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Requests;

class ImportController extends Controller
{
    public function index()
    {
        return view('imports/index');
    }

    public function search(){
        $imports = Import::all();
        $imports->load(['Supplier', 'Item']);
        $this->Results['Data'] = $imports;

        return response()->json($this->Results);
    }

    public function create($id)
    {
        $supplier = Supplier::find($id);

        $items = Item::all();
        $results = array(
            'items'     => $items,
            'supplier'  => $supplier
        );

        return view('imports/create', $results);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), Import::rules());
            if($validator->fails())
            {
                $this->Fail();
                $this->Invalid($validator);
            }else{
                $import = new Import();
                $import->ImportDate = $request->ImportDate;
                $import->TransferDate = $request->TransferDate;
                $import->SupplierId = $request->SupplierId;
                $import->ItemId = $request->ItemId;
                $import->CarNumber = $request->CarNumber;
                $import->Quantity = $request->Quantity;
                $import->SalePrice = $request->SalePrice;
                $import->PayAmount = ($request->PayAmount == ''? 0 : $request->PayAmount);
                $import->IsOrder = $request->IsOrder;
                $import->SubTotal = $this->CalTotal($request->Quantity, $request->SalePrice);
                $import->DateCreated = date('Y-m-d H:i:s');
                $import->save();
                if($request->IsOrder == 0)
                {
                    $this->UpdateStock($request->ItemId, $request->Quantity);
                }
                DB::commit();
            }
        } catch (Exception $e) {
            $this->Fail();
            $this->SetMessage($e);
            DB::rollBack();
        }

        return response()->json($this->Results);
    }

    public function show($id)
    {
        //
    }

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

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        //
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
        $item->UnitInStock = ($item->UnitInStock + $quantity);
        $item->save();
    }
}
