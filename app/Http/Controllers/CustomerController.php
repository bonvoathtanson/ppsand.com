<?php

namespace App\Http\Controllers;
use Validator;
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

    public function search()
    {
        $customers = Customer::all();
        $this->SetData($customers);

        return response()->json($this->Results);
    }

    public function filter($keyword='')
    {
        $key = "%$keyword%";
        $customers = Customer::where('CustomerCode', 'Like', $key)
                            ->orwhere('CustomerName', 'Like', $key)
                            ->orwhere('PhoneNumber', 'Like', $key)
                            ->get();
        $this->SetData($customers);

        return response()->json($this->Results);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Customer::rules());
        if($validator->fails())
        {
            $this->Fail();
            $this->SetMessage($validator->messages()->first());
        }else{
            $customer = new Customer();
            $customer->CustomerCode = $request->CustomerCode;
            $customer->CustomerName = $request->CustomerName;
            $customer->Sex = $request->Sex;
            $customer->PhoneNumber = $request->PhoneNumber;
            $customer->Address = $request->Address;
            $customer->TypeId = 1;
            $customer->DateCreated = date('Y-m-d H:i:s');
            $customer->save();
        }
        return response()->json($this->Results);
    }

    public function edit($id)
    {
        $customer = Customer::find($id);

        return view('customers.edit', ['customer' => $customer]);
    }

    public function update(Request $request)
    {
        $id = $request->Id;
        $customer = Customer::find($id);
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
