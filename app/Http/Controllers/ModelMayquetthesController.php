<?php

namespace App\Http\Controllers;

use App\model_mayquetthes;
use Illuminate\Http\Request;

class ModelMayquetthesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = model_mayquetthes::select('id', 'name')->get();
        return view('viewMayquet', compact(['result']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\model_mayquetthes  $model_mayquetthes
     * @return \Illuminate\Http\Response
     */
    public function show(model_mayquetthes $model_mayquetthes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model_mayquetthes  $model_mayquetthes
     * @return \Illuminate\Http\Response
     */
    public function edit(model_mayquetthes $model_mayquetthes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model_mayquetthes  $model_mayquetthes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, model_mayquetthes $model_mayquetthes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model_mayquetthes  $model_mayquetthes
     * @return \Illuminate\Http\Response
     */
    public function destroy(model_mayquetthes $model_mayquetthes)
    {
        //
    }
}
