<?php

namespace App\Http\Controllers;

use App\model_nguoidung;
use App\model_phongban1;
use App\model_vaora;
use Illuminate\Http\Request;

class ModelNguoidungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = model_nguoidung::select('id', 'name', 'id_phongban')->get();
        $phongban = model_phongban1::pluck('name', 'id');
        return view('viewNhanvien', compact(['result', 'phongban']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idPhongban = model_phongban1::pluck('name', 'id');
        return view('addNhanvien', compact(['idPhongban']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nhanvien = new model_nguoidung();
        $nhanvien->id=$request->id;
        $nhanvien->name=$request->name;
        $nhanvien->id_phongban=$request->id_phongban;
        if($nhanvien->save()){
            return redirect()->route('addnhanvien');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model_nguoidung  $model_nguoidung
     * @return \Illuminate\Http\Response
     */
    public function show(model_nguoidung $model_nguoidung)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model_nguoidung  $model_nguoidung
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nhanvien = model_nguoidung::find($id);
        $phongbanId = model_phongban1::pluck('name', 'id');
        return view('editNhanvien', compact(['nhanvien', 'phongbanId']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model_nguoidung  $model_nguoidung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nhanvien = model_nguoidung::find($id);
        $nhanvienEdit = $request->all();
        if ($nhanvien->update($nhanvienEdit)) {
            return redirect()->route('viewnhanvien');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model_nguoidung  $model_nguoidung
     * @return \Illuminate\Http\Response
     */
    public function destroy(model_nguoidung $model_nguoidung)
    {
        //
    }
}
