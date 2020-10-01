<?php

namespace App\Http\Controllers;

use App\model_mayquetthes;
use App\model_vaora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class ModelVaoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = model_vaora::select('id', 'id_mayquet', 'id_nhanvien', 'ngay_gio')->get();
        return view('viewNhanvienVao', compact(['result']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $may = model_mayquetthes::pluck('name', 'id');
        return view('addNhanvienVao', compact(['may']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vao = new model_vaora();
        $vao->id = $request->id;
        $vao->id_mayquet = $request->id_mayquet;
        $vao->id_nhanvien = $request->id_nhanvien;
        $vao->ngay_gio = $request->ngay_gio;
        if ($vao->save()) {
            return redirect()->route("vao");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model_vaora  $model_vaora
     * @return \Illuminate\Http\Response
     */
    public function show(model_vaora $model_vaora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model_vaora  $model_vaora
     * @return \Illuminate\Http\Response
     */
    public function edit(model_vaora $model_vaora)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model_vaora  $model_vaora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, model_vaora $model_vaora)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model_vaora  $model_vaora
     * @return \Illuminate\Http\Response
     */
    public function destroy(model_vaora $model_vaora)
    {
        //
    }

    public function findNhanvienVao(Request $request)
    {
        $nhanvien = $request->nhanvien;
        $ngay = $request->ngay;
        $nhanvienNgay = model_vaora::where('id_nhanvien', $nhanvien)->whereDay('ngay_gio', $ngay)->get();
        return view('findNhanvienVao', compact(['nhanvienNgay']));
    }

    public function thongke(Request $request)
    {
        $thongKe = new stdClass();
        $thongKe->map = [];
        $month = (int) ($request->month ?? date('m'));
        $year = (int) ($request->year ?? date('Y'));
        DB::table('model_vaoras')
            ->selectRaw('EXTRACT(day FROM created_at) as ngay, max(created_at), min(created_at), count(*)')
            ->whereMonth('created_at', $month)
            ->where('id_nhanvien', $request->nhanvienId)
            ->groupByRaw('ngay')
            ->orderByRaw('2')
            ->each(function ($record) use ($thongKe) {
                $thongKe->map[$record->ngay] = $record;
            });

        return view('viewThongKeNgay', ['month' => $month, 'year' => $year, 'maxDate' => date('t', strtotime("$year-$month-1")), 'thongKe' => $thongKe->map, 'nhanvienId' => $request->nhanvienId]);
    }
}
