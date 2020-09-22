<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class authencation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // $chucnang = DB::table('chucnang')->where('routename', Route::currentRouteName())->first(); //kiểm tra chức năng
        // if(isset($chucnang->id)){ //chức năng tồn tại
        //     $quyen = DB::table('chucnang_user')->where('id_user', Auth::user()->id)
        //                                         ->where('id_chucnang', $chucnang->id)
        //                                         ->first();
        //     if($quyen && $quyen->id_user==Auth::user()->id){
        //         return $next($request);
        //     } else {
        //         return redirect('khongcoquyen');
        //     }
        // } else {
        //     return redirect('khongcoquyen');
        // }

        $chucnangn = DB::table('chucnang')->where('routename', Route::currentRouteName())->first(); //kiểm tra chức năng
        $nhomn = DB::table('nhom')->where('name')->first(); //kiểm tra nhóm
        // if(isset($nhomn->id) && isset($chucnangn->id)){ //nhóm và chức năng có tồn tại
        //     $nhomuser = DB::table('usernhom')->where('user_id', Auth::user()->id)
        //                                     ->where('nhom_id', $nhomn->id)
        //                                     ->first();
            

        //     $quyenn = DB::table('chucnangnhom')->where('nhom_id', $nhomn->id)
        //                                         ->where('chucnang_id', $chucnangn->id)
        //                                         ->first();
        //     if($nhomuser && $nhomuser->user_id==Auth::user()->id && $quyenn && $quyenn->chucnang_id==$nhomn->id){
        //         return $next($request);
        //     } else {
        //         return redirect('khongcoquyen');
        //     }
        // } else {
        //     return redirect('khongcoquyen');
        // }
        
        // if(isset($chucnangn->id)){
        //     $nhom1 = DB::table('chucnangnhom')->where('nhom_id', $nhomn->id)
        //                                             ->where('chucnang_id', $chucnangn->chucnang_id)
        //                                             ->first();
        //     if(isset($nhom1->id)){
        //         $quyen1 = DB::table('usernhom')->where('user_id', Auth::user()->id)
        //                                             ->where('chucnang_id', $chucnangn->id)
        //                                             ->first();
        //         if($quyen1 && $quyen1->user_id==Auth::user()->id){
        //             return $next($request);
        //         } else {
        //             return redirect('khongcoquyen');
        //         }
        //     } else {
        //         return redirect('khongco');
        //     }    
        // } else {
        //     return redirect('khong');
        // }
    }
}
