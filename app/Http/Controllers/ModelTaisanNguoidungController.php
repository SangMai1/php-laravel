<?php

namespace App\Http\Controllers;

use App\model_taisan_nguoidung;
use Illuminate\Http\Request;

class ModelTaisanNguoidungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = model_taisan_nguoidung::select('id', 'name')->get();
        return view('/taisan/viewNguoidung', compact(['result']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/taisan/addNguoidung');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nguoidung = new model_taisan_nguoidung();
        $nguoidung->id = $request->id;
        $nguoidung->name = $request->name;
        if ($nguoidung->save()) {
            return redirect()->route('addnd');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model_taisan_nguoidung  $model_taisan_nguoidung
     * @return \Illuminate\Http\Response
     */
    public function show(model_taisan_nguoidung $model_taisan_nguoidung)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model_taisan_nguoidung  $model_taisan_nguoidung
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nguoidung = model_taisan_nguoidung::find($id);
        return view('/taisan/editNguoidung', compact(['nguoidung']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model_taisan_nguoidung  $model_taisan_nguoidung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nguoidung = model_taisan_nguoidung::find($id);
        $nguoidungEdit = $request->all();
        if ($nguoidung->update($nguoidungEdit)) {
            return redirect()->route('viewnguoidung');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model_taisan_nguoidung  $model_taisan_nguoidung
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nguoidung = model_taisan_nguoidung::destroy($id);
        return redirect()->route('viewnguoidung');
    }
}
