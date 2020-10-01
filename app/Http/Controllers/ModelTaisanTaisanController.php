<?php

namespace App\Http\Controllers;

use App\model_taisan_chungloai;
use App\model_taisan_nguoidung;
use App\model_taisan_taisan;
use Illuminate\Http\Request;

class ModelTaisanTaisanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = model_taisan_taisan::select('id', 'name', 'id_chungloai', 'id_nguoidung')->get();
        $chungloai = model_taisan_chungloai::pluck("name", "id");
        $nguoidung = model_taisan_nguoidung::pluck("name", "id");
        return view('/taisan/viewTaisan', compact(['result', 'chungloai', 'nguoidung']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idChungloai = model_taisan_chungloai::pluck('name', 'id');
        $idNguoidung = model_taisan_nguoidung::pluck('name', 'id');
        return view('/taisan/addTaisan', compact(['idChungloai', 'idNguoidung']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $taisan = new model_taisan_taisan();
        $taisan->id = $request->id;
        $taisan->name = $request->name;
        $taisan->id_chungloai = $request->id_chungloai;
        $taisan->id_nguoidung = $request->id_nguoidung;
        if ($taisan->save()) {
            return redirect()->route('addtaisan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model_taisan_taisan  $model_taisan_taisan
     * @return \Illuminate\Http\Response
     */
    public function show(model_taisan_taisan $model_taisan_taisan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model_taisan_taisan  $model_taisan_taisan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taisan = model_taisan_taisan::find($id);
        $chungloaiId = model_taisan_chungloai::pluck('name', 'id');
        $nguoidungId = model_taisan_nguoidung::pluck('name', 'id');
        return view('/taisan/editTaisan', compact(['taisan','chungloaiId', 'nguoidungId']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model_taisan_taisan  $model_taisan_taisan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $taisan = model_taisan_taisan::find($id);
        $taisanEdit = $request->all();
        if ($taisan->update($taisanEdit)) {
            return redirect()->route('viewtaisan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model_taisan_taisan  $model_taisan_taisan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $taisan = model_taisan_taisan::destroy($id);
        return redirect()->route('viewtaisan');
    }
}
