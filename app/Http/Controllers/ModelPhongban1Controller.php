<?php

namespace App\Http\Controllers;

use App\model_phongban1;
use Illuminate\Http\Request;

class ModelPhongban1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = model_phongban1::select('id', 'name')->get();
        return view('viewPhongban', compact(['result']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addPhongban');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $phongban = new model_phongban1();
        $phongban->id=$request->id;
        $phongban->name = $request->name;
        if($phongban->save()){
            return redirect()->route("addphongban");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model_phongban1  $model_phongban1
     * @return \Illuminate\Http\Response
     */
    public function show(model_phongban1 $model_phongban1)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model_phongban1  $model_phongban1
     * @return \Illuminate\Http\Response
     */
    public function edit(model_phongban1 $model_phongban1)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model_phongban1  $model_phongban1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, model_phongban1 $model_phongban1)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model_phongban1  $model_phongban1
     * @return \Illuminate\Http\Response
     */
    public function destroy(model_phongban1 $model_phongban1)
    {
        //
    }
}
