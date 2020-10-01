<?php

namespace App\Http\Controllers;

use App\model_taisan_chungloai;
use App\model_taisan_nhacungcap;
use Illuminate\Http\Request;

class ModelTaisanChungloaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = model_taisan_chungloai::select('id', 'name', 'id_nhacungcap')->get();
        $nhacungcap = model_taisan_nhacungcap::pluck("name", "id");
        return view('/taisan/viewChungloai', compact(['result', 'nhacungcap']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idNhacungcap = model_taisan_nhacungcap::pluck('name', 'id');
        return view('/taisan/addChungloai', compact(['idNhacungcap']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chungloai = new model_taisan_chungloai();
        $chungloai->id = $request->id;
        $chungloai->name = $request->name;
        $chungloai->id_nhacungcap = $request->id_nhacungcap;
        if($chungloai->save()){
            return redirect()->route('addchungloai');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model_taisan_chungloai  $model_taisan_chungloai
     * @return \Illuminate\Http\Response
     */
    public function show(model_taisan_chungloai $model_taisan_chungloai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model_taisan_chungloai  $model_taisan_chungloai
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chungloai = model_taisan_chungloai::find($id);
        $nhacungcap = model_taisan_nhacungcap::pluck('name', 'id');
        return view('/taisan/editChungloai', compact(['chungloai', 'nhacungcap']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model_taisan_chungloai  $model_taisan_chungloai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $chungloai = model_taisan_chungloai::find($id);
        $chungloaiEdit = $request->all();
        if ($chungloai->update($chungloaiEdit)) {
            return redirect()->route('viewchungloai');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model_taisan_chungloai  $model_taisan_chungloai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chungloai = model_taisan_chungloai::destroy($id);
        return redirect()->route('viewchungloai');
    }
}
