<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Supplier;
use App\Models\Import;
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
        $transfers = Import::where('SupplierId', '=', $id)
                        ->where('IsOrder', '=', 1)
                        ->orderBy('ImportDate', 'DESC')->get();

        $oncredits = Import::where('SupplierId', '=', $id)
                        ->where('SubTotal', '>', DB::raw('PayAmount'))
                        ->orderBy('ImportDate', 'DESC')->get();

        $onpayoffs = Import::where('SupplierId', '=', $id)
                        ->where('SubTotal', '<=', DB::raw('PayAmount'))
                        ->orderBy('ImportDate', 'DESC')->get();

        $results = array(
            'supplier' => $supplier,
            'transfers' => $transfers,
            'oncredits' => $oncredits,
            'onpayoffs' => $onpayoffs
        );

        return view('imports/create', $results);
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
