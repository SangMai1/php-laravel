<?php

namespace App\Http\Controllers;

use App\model_taisan_nhacungcap;
use Illuminate\Http\Request;

class ModelTaisanNhacungcapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = model_taisan_nhacungcap::select('id', 'name')->get();
        return view('/taisan/viewNhacungcap', compact(['result']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/taisan/addNhacungcap');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nhacungcap = new model_taisan_nhacungcap();
        $nhacungcap->id = $request->id;
        $nhacungcap->name = $request->name;
        if ($nhacungcap->save()) {
            return redirect()->route('addncc');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model_taisan_nhacungcap  $model_taisan_nhacungcap
     * @return \Illuminate\Http\Response
     */
    public function show(model_taisan_nhacungcap $model_taisan_nhacungcap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model_taisan_nhacungcap  $model_taisan_nhacungcap
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nhacungcap = model_taisan_nhacungcap::find($id);
        return view('/taisan/editNhacungcap', compact(['nhacungcap']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model_taisan_nhacungcap  $model_taisan_nhacungcap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nhacungcap = model_taisan_nhacungcap::find($id);
        $nhacungcapEdit = $request->all();
        if ($nhacungcap->update($nhacungcapEdit)) {
            return redirect()->route('viewnhacungcap');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model_taisan_nhacungcap  $model_taisan_nhacungcap
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nhacungcap = model_taisan_nhacungcap::destroy($id);
        return redirect()->route('viewnhacungcap');
    }
}
