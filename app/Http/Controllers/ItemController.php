<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Http\Requests;

class ItemController extends Controller
{
    public function index()
    {
        return view('items.index');
    }

    public function search(){
        $items = Item::all();
        $this->Results['Data'] = $items;
        
        return response()->json($this->Results);
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $item = new Item();
        $item['ItemCode'] = $request['itemcode'];
        $item->ItemName = $request->itemname;
        $item->SalePrice = $request->price;
        $item->UnitInStock = $request->quantity;
        $item->DateCreated = date('Y-m-d H:i:s');
        $item->save();

        return response()->json($this->Results);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $item = Item::find($id);

        return view('items.edit', ['item' => $item]);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $item = Item::find($id);
        $item->ItemCode = $request->itemcode;
        $item->ItemName = $request->itemname;
        $item->SalePrice = $request->price;
        $item->UnitInStock = $request->quantity;
        $item->LastUpdated = date('Y-m-d H:i:s');
        $item->save();

        return response()->json($this->Results);
    }

    public function destroy($id)
    {
        $rowAffect = Item::find($id)->delete();
        if($rowAffect == 0)
        {
            $this->Results['IsError'] = true;
            $this->SetMessage('ការលុប​ទិន្នន័យមានបញ្ហាសូមព្យា​យាម​ម្តងទៀត');
        }

        return response()->json($this->Results);
    }
}
