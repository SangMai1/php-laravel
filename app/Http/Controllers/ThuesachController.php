<?php

namespace App\Http\Controllers;

use App\sach;
use App\thuesach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThuesachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thueSachs = DB::table("thuesaches")->get();
        return view("viewThueSach", compact(['thueSachs']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idSach = sach::pluck('tensach', 'id');
        return view('addThueSach', compact(['idSach']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $thueSach = new thuesach();
        $thueSach->id=$request->id;
        $thueSach->idsach_thue = $request->idsach_thue;
        $thueSach->nguoi_thue=$request->nguoi_thue;
        $thueSach->soluong_thue=$request->soluong_thue;
        $thueSach->ngay_thue=$request->ngay_thue;
        $thueSach->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\thuesach  $thuesach
     * @return \Illuminate\Http\Response
     */
    public function show(thuesach $thuesach)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\thuesach  $thuesach
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thueSachs = thuesach::find($id);
        $sachId = sach::pluck('tensach', 'id');
        return view('editThueSach', compact(['thueSachs', 'sachId']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\thuesach  $thuesach
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $thueSach = thuesach::find($id);
        $thueSachEdit = $request->all();
        if ($thueSach->update($thueSachEdit)) {
            return redirect()->route('thuesach');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\thuesach  $thuesach
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $thueSach = thuesach::destroy($id);
        return redirect()->route('thuesach');
    }

    public function viewChiTietThueSach($id)
    {
        $ctThueSach = DB::table("thuesaches")->where("id", $id)->get();
        $sach = DB::table("saches")->pluck("tensach", "id");
        return view("viewChiTietThueSach", compact(['ctThueSach', 'sach']));
    }

    public function viewThueSachNgay(Request $request){
        $search = $request->search;
        $thueNgay = DB::table("thuesaches")->whereDay('ngay_thue', $search)->get();
        $phieuNgay = DB::table("thuesaches")->whereDay('ngay_thue', $search)->count();
        $sachNgay = DB::table("thuesaches")->whereDay('ngay_thue', $search)->sum("soluong_thue");
        return view("viewSachNgay", compact(['thueNgay', 'phieuNgay', 'sachNgay']));
    }

    public function viewThueSachThang(Request $request){
        $search = $request->search;
        $thueThang = DB::table("thuesaches")->whereMonth('ngay_thue', $search)->get();
        $phieuThang = DB::table("thuesaches")->whereMonth('ngay_thue', $search)->count();
        $sachThang = DB::table("thuesaches")->whereMonth('ngay_thue', $search)->sum("soluong_thue");
        return view("viewSachThang", compact(['thueThang', 'phieuThang', 'sachThang']));
    }
}
