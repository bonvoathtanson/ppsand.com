<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Requests;

class SupplierController extends Controller
{
    public function index()
    {
        return view('suppliers/index');
    }

    public function create()
    {
        return view('suppliers/create');
    }

    public function search()
    {
        $suppliers = Supplier::all();
        $this->SetData($suppliers);

        return response()->json($this->Results);
    }

    public function store(Request $request)
    {
        $supplier = new Supplier();
        $supplier->SupplierCode = $request->SupplierCode;
        $supplier->SupplierName = $request->SupplierName;
        $supplier->Sex = $request->Sex;
        $supplier->PhoneNumber = $request->PhoneNumber;
        $supplier->Address = $request->Address;
        $customer->LastUpdated = date('Y-m-d H:i:s');
        $customer->save();

        return response()->json($this->Results);
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);

        return view('suppliers.edit', ['supplier' => $supplier]);
    }

    public function update(Request $request)
    {
        $id = $request->Id;
        $supplier = Supplier::find($id);
        $supplier->SupplierCode = $request->SupplierCode;
        $supplier->SupplierName = $request->SupplierName;
        $supplier->Sex = $request->Sex;
        $supplier->PhoneNumber = $request->PhoneNumber;
        $supplier->Address = $request->Address;
        $supplier->LastUpdated = date('Y-m-d H:i:s');
        $supplier->save();

        return response()->json($this->Results);
    }

    public function destroy($id)
    {
        $rowaffect = Supplier::find($id)->delete();
        if($rowaffect == 0){
            $this->SetError(true);
            $this->SetMessage('ការលុប​ទិន្នន័យមានបញ្ហាសូមព្យា​យាម​ម្តងទៀត');
        }

        return response()->json($this->Results);
    }
}
