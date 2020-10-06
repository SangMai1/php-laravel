<?php

namespace App\Http\Controllers;

use App\model_caphocs;
use App\model_lophocs;
use Illuminate\Http\Request;

class ModelLophocsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lops = model_lophocs::select('id', 'lop', 'cap')->get();
        $cap = model_caphocs::pluck('name', 'id');
        return view("/bansach/viewlop", compact(['lops', 'cap']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idCap = model_caphocs::pluck('name', 'id');
        return view('/bansach/addLop', compact(['idCap']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lop = new model_lophocs();
        $lop->id = $request->id;
        $lop->lop = $request->lop;
        $lop->cap = $request->cap;
        if ($lop->save()) {
            return redirect()->route('viewlophoc');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model_lophocs  $model_lophocs
     * @return \Illuminate\Http\Response
     */
    public function show(model_lophocs $model_lophocs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model_lophocs  $model_lophocs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lop = model_lophocs::find($id);
        $cap = model_caphocs::pluck('name', 'id');
        return view('/bansach/editLop', compact(['lop', 'cap']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model_lophocs  $model_lophocs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lop = model_lophocs::find($id);
        $lophocEdit = $request->all();
        if ($lop->update($lophocEdit)) {
            return redirect()->route('viewlophoc');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model_lophocs  $model_lophocs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lop = model_lophocs::destroy($id);
        return redirect()->route('viewlophoc');
    }
}
