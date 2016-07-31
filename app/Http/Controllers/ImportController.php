<?php

namespace App\Http\Controllers;
use DB;
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
            DB::commit();
        } catch (Exception $e) {
            $this->Fail();
            $this->SetMessage($e);
            DB::rollBack();
        }
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

    private function UpdateStock($itemId, $quantity)
    {
        $item = Item::find($itemId);
        $item->UnitInStock = ($item->UnitInStock + $quantity);
        $item->save();
    }
}
