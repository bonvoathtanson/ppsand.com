<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Customer;
use App\Models\Income;
use App\Models\Sale;
use Illuminate\Http\Request;
use App\Http\Requests;

class IncomeController extends Controller
{
    public function index()
    {
        return view('incomes.index');
    }

    public function create($id)
    {
        $customer = Customer::find($id);
        $sales = Sale::where('CustomerId', '=', $id)
                    ->where('SubTotal', '>', DB::raw('PayAmount'))
                    ->orderBy('SaleDate', 'ASC')->get();
        $results = array(
            'customer' => $customer,
            'sales' => $sales
        );
        return view('incomes.create', $results);
    }

    public function otherincome()
    {
        return view('incomes.other');
    }

    public function search(){
        $incomes = Income::all();
        $incomes->load('Customer');
        $this->SetData($incomes);

        return response()->json($this->Results);
    }

    public function store(Request $request)
    {
        $income = new Income();
        $income->CustomerCode = $request->CustomerCode;
        $income->CustomerName = $request->CustomerName;
        $income->Sex = $request->Sex;
        $income->PhoneNumber = $request->PhoneNumber;
        $income->Address = $request->Address;
        $income->TypeId = 1;
        $income->DateCreated = date('Y-m-d H:i:s');
        $income->save();

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
}
