<?php

namespace App\Http\Controllers;

use App\model_caphocs;
use Illuminate\Http\Request;

class ModelCaphocsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $caphocs = model_caphocs::select('id', 'name')->get();
        return view('/bansach/viewCaphoc', compact(['caphocs']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/bansach/addCaphoc');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $s = new model_caphocs();
        $s->id = $request->id;
        $s->name = $request->name;
        $s->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model_caphocs  $model_caphocs
     * @return \Illuminate\Http\Response
     */
    public function show(model_caphocs $model_caphocs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model_caphocs  $model_caphocs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $caphoc = model_caphocs::find($id);
        return view("/bansach/editCaphoc", compact(['caphoc']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model_caphocs  $model_caphocs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $caphoc = model_caphocs::find($id);
        $caphocedit = $request->all();
        if ($caphoc->update($caphocedit)) {
            return redirect()->route('viewcaphoc');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model_caphocs  $model_caphocs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $caphoc = model_caphocs::destroy($id);
        return redirect()->route('viewcaphoc');
    }
}
