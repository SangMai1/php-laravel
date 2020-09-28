<?php

namespace App\Http\Controllers;

use App\sach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sachs = DB::table("saches")->get();
        return view("viewSach", compact(['sachs']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addSach');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $s = new sach();
        $s->id=$request->id;
        $s->tensach=$request->tensach;
        $s->soluong=$request->soluong;
        $s->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\sach  $sach
     * @return \Illuminate\Http\Response
     */
    public function show(sach $sach)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sach  $sach
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sache = sach::find($id);
        return view("editSach", compact(['sache']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sach  $sach
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sach = sach::find($id);
        $sachedit = $request->all();
        if($sach->update($sachedit)){
            return redirect()->route('viewsach');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sach  $sach
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sach = sach::destroy($id);
        return redirect()->route('viewsach');
    }

    public function viewBaoCaoSach(Request $request){
        $search = $request->search;
        $sachThang = DB::table('saches')
            ->leftJoin('thuesaches', 'saches.id', '=', 'thuesaches.idsach_thue')
            ->select('thuesaches.nguoi_thue', 'thuesaches.soluong_thue')
            ->whereMonth('ngay_thue', $search)
            ->orderByDesc('thuesaches.soluong_thue')
            ->get();
        return view("viewBaoCaoSach", compact(['sachThang'])); 
    }

}
