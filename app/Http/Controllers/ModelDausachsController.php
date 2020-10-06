<?php

namespace App\Http\Controllers;

use App\model_dausachs;
use App\model_lophocs;
use Illuminate\Http\Request;

class ModelDausachsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dausachs = model_dausachs::select('id', 'name', 'gia', 'lop')->get();
        $lop = model_lophocs::pluck('lop', 'id');
        return view("/bansach/viewSach", compact(['dausachs', 'lop']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idLop = model_lophocs::pluck('lop', 'id');
        return view('/bansach/addSach', compact(['idLop']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dausach = new model_dausachs();
        $dausach->id = $request->id;
        $dausach->name = $request->name;
        $dausach->gia = $request->gia;
        $dausach->lop = $request->lop;
        if ($dausach->save()) {
            return redirect()->route('viewdausach');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model_dausachs  $model_dausachs
     * @return \Illuminate\Http\Response
     */
    public function show(model_dausachs $model_dausachs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model_dausachs  $model_dausachs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dausach = model_dausachs::find($id);
        $lop = model_lophocs::pluck('lop', 'id');
        return view('/bansach/editSach', compact(['dausach', 'lop']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model_dausachs  $model_dausachs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dausach = model_dausachs::find($id);
        $dausachEdit = $request->all();
        if ($dausach->update($dausachEdit)) {
            return redirect()->route('viewdausach');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model_dausachs  $model_dausachs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dausach = model_dausachs::destroy($id);
        return redirect()->route('viewdausach');
    }
}
