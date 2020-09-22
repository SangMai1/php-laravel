<?php

use Illuminate\Support\Facades\Route;
use App\Phongban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/manhinhthemoi', function(){
    //echo "Man hinh them mới";
    //lấy toàn bộ dữ liệu table
    //$userArr = DB::table("users")->get();
    //dùng for lấy tên dữ liệu
    // foreach($userArr as $user){
    //     echo $user->name;
    // }

    //lấy dòng đầu tiên của table
    // $user = DB::table("users")->first();
    // dd($user->name);

    //lấy có where
    // $userArr = DB::table("users")->where("email","vansang1532000@gmail.com")
    //                             ->where("id",2)
    //                             ->get();
    // dd($userArr);
    //phần điều kiện <,>,<>,=,like,@@
    //lấy dữ liệu theo cột (thướng dùng khi lấy cấu hình, check quyền)
    // $name = DB::table("users")->where("email","=", "vansang1532000@gmail.com")
    //                             ->where("id","=",2)
    //                             ->value("name");
    //lấy dữ liệu theo id
    // $user = DB::table("users")->find(2);
    // dd($user);
    //lấy 1 mảng theo cột
    // $userIdArr = DB::table("users")->pluck("id");
    // dd($userIdArr);
    //lấy 1 mảng theo cột theo key & value, để đổ vào combobox
    // $userIdArr = DB::table("users")->pluck("name","id");
    // dd($userIdArr);



});//->middleware('ghilog')->middleware('authencation')->name('ad');
Route::get("/update/{id}", function($id){
    // bổ sung 2 cột chucdanhid, phongbanid cho users
    // Viết màn hình cập nhật user(phongbanid và chucdanhid)
    $userId = DB::table("users")->find($id);
    $chucdanhId = DB::table("chucdanh")->pluck("name", "id");
    $phongbanId = DB::table("phongban")->pluck("name", "id");
    return view("editUser", ['userId' => $userId, 'chucdanhId' => $chucdanhId, 'phongbanId' => $phongbanId]);
});

Route::post("/edit/{id}", function(Request $request ,$id){
    $dtname = $request->name;
    $dtpb = $request->phongbanid;
    $dtcd = $request->chucdanhid;
    $userId = DB::table("users")->where('id',$id)->update(["name"=>$dtname, "phongbanid"=>$dtpb, "chucdanhid"=>$dtcd]);
    
    if($userId){
        return redirect()->route("viewuser");
    };
})->name("capnhat");

Route::get("/addUsers", function(){
    $phongbanId = DB::table("phongban")->pluck("name", "id");
    return view("addUsers", ['phongbanId' => $phongbanId]);
})->name("adduser");

Route::get("/viewUser", function(){
    $userArr = DB::table("users")->get();
    $chucdanh = DB::table("chucdanh")->pluck("name", "id");
    $phongban = DB::table("phongban")->pluck("name", "id");
    return view("viewUsers", compact(["userArr", "chucdanh", "phongban"]));
})->name("viewuser");

Route::get('/khongcoquyen', function () {
    echo "khongcoquyen";
})->name('khongcoquyen');

Route::get('/khongco', function () {
    echo "khongco";
})->name('khongco');
Route::get('/khong', function () {
    echo "khong";
})->name('khong');

// middleware saferequest kiểm tra dữ liệu nhập lên từ post hoặc get có dấu / \ hay không
// nếu có thì bỏ qua request đó.
// foreach $_REQUEST theo key value
Route::get("/kiemtra", function () {
    echo "boqua111";
})->middleware('saferequest')->name("kiem");

Route::get('/yes', function(){
    echo "yes";
})->name('yes');

//Tạo các entity chucnang (routename)
//entity chucnang_user(2 file chính id user, id chucnang)
//thực hiện viết middleware authencation
//để kiểm tra quyền truy cập của 1 người dùng đến 1 route
Route::get('/chucnang', function(){
    echo('chucnang');
})->middleware('authencation')->name('chucnang');

Route::get('/nhom', function(){
    echo('nhom');
})->middleware('authencation')->name('nhom');

Route::get('/save', function(){
    echo('save');
})->middleware('authencation')->name('save');

Route::get('/edit', function(){
    echo('edit');
})->middleware('authencation')->name('edit');

// bổ sung entity nhomnguoidung, nguoidung_nhom, nguoidung_chucnang
// Một người dùng thuộc nhiều nhóm
// Một nhóm có nhiều chức năng
// Kiểm tra quyền: gồm quyền ở bảng nguoidungchucnang và nhom_chucnang



// Route::post('/luudulieu', function(Request $request){
//     echo $request->request->get("ten"); //lấy dữ liệu submit
// })->name("luudulieu");

// Route::get('/add/{so1}/{so2}', function ($so1, $so2) {
//     echo "Tong la:" . ($so1+$so2);
// });

// Route::get('/update/{id}/{ten}', function ($id, $ten) {
//     echo route("capnhatnguoidung");
//     //echo "Hien thi form"; 
// })->where(['id'=>'[0-9]+','ten'=>'[a-zA-Z0-9]+'])->name("capnhatnguoidung");//regula expression

// Route::post('/update', function(){
//     echo "thuc hien cap nhat";
// })->name("capnhatnguoidung");

// Route::get('/blabla', function(){
//     echo route("capnhatnguoidung", ['id'=>1, 'ten' => 'abc']);
// });

// Route::get('/bloblo', function(){
//     return view("tong", ['id'=>1, 'ten'=>'sang']);
// });

// Route::post('/bleble', function () {
//     return view("tru");
// })->name("submitdenday");

// Route::any('/', function () {
//     return view('welcome');
// });

Route::get("view", function(){
    $result = Phongban::select('id', 'name')->get();
    return view("viewNguoidung", ['result'=> $result]);
})->name("viewnguoidung");

Route::get("/apb", function(){
    return view("addNguoidung");
});

Route::post("/addpb", function(Request $request){
    $pb = new Phongban();
    $pb -> id = $request -> id;
    $pb -> name = $request -> name;
    $pb -> save();
    return view("viewNguoidung");
})->name("addPB");

Route::get("update1/{id}", function($id){
    $pb = Phongban::find($id);
    return view("editNguoidung", ['pb'=>$pb]);
});

Route::post("update22/{id}", function(Request $request, $id){
    $pb = Phongban::find($id);
    $dt = $request->all();
    if($pb->update($dt)){
        return redirect()->route("viewnguoidung");
    }
    
})->name("editPB");

Route::get("del/{id}", function($id){
    Phongban::destroy($id);
    return redirect()->route("viewnguoidung");
});
// Route::get('add', function(){
//     return view("addNguoidung");
// });

// Route::post('/addNguoidung', function(){
    
//     $id = $_POST["id"];
//     $name = $_POST["name"];
//     $db = new PDO("pgsql:dbname=php;host=localhost", "postgres", "12345");
//     $sth = $db -> prepare("INSERT INTO nguoidung(id, name) VALUES (?,?)");
//     $sth -> execute([$id, $name]);
//     return view('addNguoidung');
// })->name("addnguoidung");


// Route::get("/viewChucnang", function(){
//     $db = new PDO("pgsql:dbname=php;host=localhost", "postgres", "12345");
//     $sth = $db -> prepare("SELECT id, name FROM chucnang");
//     $sth -> execute();
//     $result = $sth -> fetchAll(PDO::FETCH_ASSOC);
//     return view('viewChucnang', ['result'=>$result]);
// })->name("viewchucnang");

// Route::get("/viewNguoidung", function () {
//     $db = new PDO("pgsql:dbname=php;host=localhost", "postgres", "12345");
//     $sth = $db->prepare("SELECT id, name FROM nguoidung");
//     $sth->execute();
//     $result = $sth->fetchAll(PDO::FETCH_ASSOC);
//     return view('viewNguoidung', ['result' => $result]);
// })->name("viewnguoidung");

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//viết 3 router get bất kỳ có tính toán (tính tổng từ 1-n, giải pt bậc 2, tính cạnh huyền của tam giác vuông);

// Route::get('sum/{so1}', function($so1){
//     $sum = 0;
//     for($i = 0; $i <= $so1; $i++){
//         $sum += $i;
//     }
//     return $sum;
// });











// //View
// Route::get('/phongban', 'PhongbanController@index')->name('phongban');

// //Create
// Route::get('/phongban/create', 'PhongbanController@create')->name('phongban.create');
// Route::post('/phongban/store', 'PhongbanController@store')->name('phongban.store');

// //Update
// Route::get('/phongban/store/{id}', 'PhongbanController@edit')->name('phongban.edit');
// Route::post('/phongban/update/{id}', 'PhongbanController@update')->name('phongban.update');

// //Delete
// Route::get('/phongban/delete/{id}', 'PhongbanController@destroy')->name('phongban.delete');
