<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Http\Requests;
use DB;

class ItemController extends Controller
{
  public function index()
  {
    $items = Item::all();
    return view('items.index', ['items' => $items]);
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
    $item->ItemCode = $request->itemcode;
    $item->ItemName = $request->itemname;
    $item->SalePrice = $request->price;
    $item->UnitInStock = $request->quantity;
    $item->DateCreated = date('Y-m-d H:i:s');
    $item->save();
    return redirect('view/item');
  }

  public function show($id)
  {
    //
  }

  public function edit($id)
  {
    //
  }

  public function update(Request $request, $id)
  {
    //
  }

  public function destroy($id)
  {
    $rowAffect = Item::where('Id', '=', $id)->delete();
    if($rowAffect == 0)
    {
      $this->Results['IsError'] = true;
      $this->Results['Message'] = 'ការលុប​ទិន្នន័យមានបញ្ហាសូមព្យា​យាម​ម្តងទៀត';
    }
    return response()->json($this->Results);
  }
}
