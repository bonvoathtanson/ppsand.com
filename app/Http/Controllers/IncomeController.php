<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;
use App\Http\Requests;

class IncomeController extends Controller
{
    public function index()
    {
        return view('incomes/index');
    }

    public function create()
    {
      return view('incomes/create');
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
