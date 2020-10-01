<?php

namespace App\Http\Controllers;

use App\model_taisan_chungloai;
use App\model_taisan_nguoidung;
use App\model_taisan_nhatki;
use App\model_taisan_taisan;
use Illuminate\Http\Request;

class ModelTaisanNhatkiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = model_taisan_nhatki::select('id', 'id_nguoidung', 'id_taisan', 'ngay')->get();
        $nguoidung = model_taisan_nguoidung::pluck("name", "id");
        $taisan = model_taisan_taisan::pluck("name", "id");
        return view('/taisan/viewDichuyen', compact(['result', 'nguoidung', 'taisan']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idNguoidung = model_taisan_nguoidung::pluck('name', 'id');
        $idTaisan = model_taisan_taisan::pluck('name', 'id');
        return view('/taisan/addDichuyen', compact(['idNguoidung', 'idTaisan']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dichuyen = new model_taisan_nhatki();
        $dichuyen->id = $request->id;
        $dichuyen->id_nguoidung = $request->id_nguoidung;
        $dichuyen->id_taisan = $request->id_taisan;
        $dichuyen->ngay = $request->ngay;
        if ($dichuyen->save()) {
            return redirect()->route('adddichuyen');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model_taisan_nhatki  $model_taisan_nhatki
     * @return \Illuminate\Http\Response
     */
    public function show(model_taisan_nhatki $model_taisan_nhatki)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model_taisan_nhatki  $model_taisan_nhatki
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dichuyen = model_taisan_nhatki::find($id);
        $taisanId = model_taisan_taisan::pluck('name', 'id');
        $nguoidungId = model_taisan_nguoidung::pluck('name', 'id');
        return view('/taisan/editDichuyen', compact(['dichuyen', 'taisanId', 'nguoidungId']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model_taisan_nhatki  $model_taisan_nhatki
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dichuyen = model_taisan_nhatki::find($id);
        $dichuyenEdit = $request->all();
        if ($dichuyen->update($dichuyenEdit)) {
            return redirect()->route('viewdichuyen');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model_taisan_nhatki  $model_taisan_nhatki
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dichuyen = model_taisan_nhatki::destroy($id);
        return redirect()->route('viewdichuyen');
    }

    public function viewBaoCao(Request $request)
    {
        $search = $request->search;
        $nguoidung = model_taisan_nguoidung::pluck("name", "id");
        $taisan = model_taisan_taisan::pluck("name", "id");
        $result = model_taisan_nhatki::where('id_taisan', $search)->get();
        return view("/taisan/viewBaoCao", compact(['result', 'nguoidung', 'taisan']));
    }
}
