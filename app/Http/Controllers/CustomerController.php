<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customers/index');
    }

    public function create()
    {
        return view('customers/create');
    }

    public function search(){
        $customers = Customer::all();
        $this->SetData($customers);

        return response()->json($this->Results);
    }

    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->CustomerCode = $request->CustomerCode;
        $customer->CustomerName = $request->CustomerName;
        $customer->Sex = $request->Sex;
        $customer->PhoneNumber = $request->PhoneNumber;
        $customer->Address = $request->Address;
        $customer->TypeId = 1;
        $customer->DateCreated = date('Y-m-d H:i:s');
        $customer->save();

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

    public function edit($id)
    {
        $customer = Customer::find($id);

        return view('customers.edit', ['customer' => $customer]);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request)
    {
        $id = $request->Id;
        $customer = Customer::find($id);
        $customer->CustomerCode = $request->CustomerCode;
        $customer->CustomerName = $request->CustomerName;
        $customer->Sex = $request->Sex;
        $customer->PhoneNumber = $request->PhoneNumber;
        $customer->Address = $request->Address;
        $customer->TypeId = $request->TypeId;
        $customer->LastUpdated = date('Y-m-d H:i:s');
        $customer->save();

        return response()->json($this->Results);
    }

    public function destroy($id)
    {
        $rowaffect = Customer::find($id)->delete();
        if($rowaffect == 0){
            $this->SetError(true);
            $this->SetMessage('ការលុប​ទិន្នន័យមានបញ្ហាសូមព្យា​យាម​ម្តងទៀត');
        }

        return response()->json($this->Results);
    }
}
