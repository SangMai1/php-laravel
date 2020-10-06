<?php

namespace App\Http\Controllers;

use App\model_dausachs;
use App\model_licensess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModelLicensessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $licenses = model_licensess::select('id', 'sach', 'trang_thai', 'ngay_dung')->get();
        $sach = model_dausachs::pluck('name', 'id');
        return view('/bansach/viewLicense', compact(['licenses', 'sach']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idSach = model_dausachs::pluck('name', 'id');
        return view('/bansach/addLicense', compact(['idSach']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $license = new model_licensess();
        $license->id = $request->id;
        $license->sach = $request->sach;
        $license->trang_thai = $request->trang_thai;
        $license->ngay_dung = $request->ngay_dung;
        if ($license->save()) {
            return redirect()->route('viewlicense');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model_licensess  $model_licensess
     * @return \Illuminate\Http\Response
     */
    public function show(model_licensess $model_licensess)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model_licensess  $model_licensess
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $license = model_licensess::find($id);
        $sach = model_dausachs::pluck('name', 'id');
        return view('/bansach/editLicense', compact(['license', 'sach']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model_licensess  $model_licensess
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $license = model_licensess::find($id);
        $licenseEdit = $request->all();
        if ($license->update($licenseEdit)) {
            return redirect()->route('viewlicense');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model_licensess  $model_licensess
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $license = model_licensess::destroy($id);
        return redirect()->route('viewlicense');
    }

    public function viewSachNgay()
    {

        $sachKickhoat = DB::select('
         SELECT max(ch.name) caphoc, max(lh.lop) lophoc, li.ngay_dung , count(*)
        FROM model_lophocs lh
        INNER JOIN model_caphocs ch ON ch.id = lh.cap
        INNER JOIN model_dausachs ds ON lh.id = ds.lop
        INNER JOIN model_licensesses li ON ds.id = li.sach
		WHERE li.trang_thai = 1
        group by ch.id, lh.id, li.ngay_dung
        ');
        return view('/bansach/viewThongke', ['sachKickhoat' => $sachKickhoat]);
    }
}
