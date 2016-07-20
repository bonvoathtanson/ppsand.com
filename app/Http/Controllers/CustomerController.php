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

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
