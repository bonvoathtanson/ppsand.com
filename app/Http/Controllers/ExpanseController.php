<?php

namespace App\Http\Controllers;
use App\Models\Expanse;
use Illuminate\Http\Request;

use App\Http\Requests;

class ExpanseController extends Controller
{
    public function index()
    {
      return view('expanses.index');
    }

    public function create()
    {
      return view('expanses/create');
    }

    public function search(){
        $expanses = Expanse::all();
        $expanses->load('Supplier');
        $this->SetData($expanses);

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
