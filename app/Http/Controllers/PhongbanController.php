<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Phongban;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use function GuzzleHttp\Promise\all;

class PhongbanController extends Controller
{
    public function index(){
        $phongban = Phongban::select('id', 'name')->get();
        return view('phongban.index')->with('phongban', $phongban);
    }

    public function create(){
        return view('phongban.create');
    }

    public function store(Request $request){
        $data = $request->except('_method','_token','submit');

        $validator = Validator::make($request->all(), [
            'id'=> 'required|integer|min:1',
            'name'=> 'required|string|min:3',
        ]);

        if($validator->fails()){
            return redirect()->Back()->withInput()->withErrors($validator);
        }

        if($record = Phongban::firstOrCreate($data)){
            Session::flash('message', 'Added Successflly!');
            Session::flash('alert-class', 'alert-sucess');
            return redirect()->route('phongban');
        } else {
            Session::flash('message', 'Data not saved!');
            Session::flash('alert-class', 'alert-danger');
        }

        return Back();
    }

    public function edit($id){
        $phongban = Phongban::find($id);

        return view('phongban.edit')->with('phongban', $phongban);
    }

    public function update(Request $request, $id){
        $data = $request->except('_method', '_token', 'suubmit');

        $validator = Validator::make($request->all(),[
            'id'=>'required|integer|min:1',
            'name'=>'required|string|min:3',
        ]);

        if($validator->fails()){
            return redirect()->Back()->withInput()->withErrors($validator);
        }

        $phongban = Phongban::find($id);

        if($phongban->update($data)){
            Session::flash('message', 'Update successfully!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('phongban');
        } else {
            Session::flash('message', 'Data not updated!');
            Session::flash('alert-class', 'alert-danger');
        }

        return Back()->withInput();
    }

    public function destroy($id){
        Phongban::destroy($id);

        Session::flash('message', 'Delete successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('phongban');
    }
}
