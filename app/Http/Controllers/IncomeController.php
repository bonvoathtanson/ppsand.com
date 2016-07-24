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
        $income->IncomeDate = date_create($request->IncomeDate);
        if($request->CustomerId != '')
        {
            $income->CustomerId = $request->CustomerId;
        }
        $income->TotalAmount = $request->TotalAmount;
        $income->IncomeType = $request->IncomeType;
        $income->Description = $request->Description;
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

    public function edit($id)
    {
        $income = Income::find($id);

        return view('incomes.edit', ['income' => $income]);
    }

    public function update(Request $request)
    {
        $id = $request->Id;
        $income = Income::find($id);
        $income->IncomeDate = date_create($request->IncomeDate);
        if($request->CustomerId != '')
        {
            $income->CustomerId = $request->CustomerId;
        }
        $income->TotalAmount = $request->TotalAmount;
        $income->IncomeType = $request->IncomeType;
        $income->Description = $request->Description;
        $income->DateCreated = date('Y-m-d H:i:s');
        $income->save();

        return response()->json($this->Results);
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
