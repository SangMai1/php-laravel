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

    //Đếm số lượng record
    // $cout = DB::table("users")->where("id", 1)->count();
    //Group by và các hàm tính toán
    // $max = DB::table("migrations")->max("batch");
    // $sum = DB::table("migrations")->sum("batch");
    // $avg = DB::table("migrations")->avg("batch");
    // echo $max; exit;

    // kiểm tra tồn tại
    // $exists = DB::table("migrations")->where("batch", 4)->exists();
    // echo $exists? "ton tai": "khong ton tai"; exit;

    // query tĩnh
    // $r = DB::select("select * from users where id =?", [1]);

    // $d = "20/12/2000";
    // $d = implode("-"(array_reverse(explode("/", $d)));
    // echo $d;


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
// Tạo bảng đơn hàng gồm (id, tên hàng, số lượng, đơn giá, thành tiền, ngày bán);
// Viết chức năng in danh sách theo ngày
// Viết chức năng in ra số tiền bán trong ngày, số đơn hàng bán trong ngày

Route::get("/viewProducts", function () {
    $products = DB::table("products")->get();
    return view("viewProducts", compact(["products"]));
})->name("viewproducts");

//in danh sách theo ngày
Route::get("/viewProductsNgay", function (Request $request) {
    $search = $request->search;
    $productsNgay = DB::table("products")->where('ngayban', $search)->get();
    if($productsNgay){
        return view("viewProductsNgay", compact(["productsNgay"]));
    }
    
    
})->name("viewproductsngay");

//in ra số tiền bán trong ngày
Route::get("/viewMoneyNgay", function(Request $request){
    $search = $request->search;
    $moneyNgay = DB::table("products")->where('ngayban', $search)->sum("thanhtien");
    return view("viewMoneyNgay", compact(["moneyNgay"]));
})->name("viewmoneyngay");

//số đơn hàng bán trong ngày
Route::get("/viewDonNgay", function(Request $request){
    $search = $request->search;
    $donNgay = DB::table("products")->where("ngayban", $search)->count();
    return view("viewDonNgay", compact(['donNgay']));
})->name("viewdonngay");
// Viết chức năng quản lý thư viện gồm 
// Danh sách sách
// Danh sách thuê sách
// Chi tiết thuê sách
// Lập báo cáo như sau:
// ---Báo cáo theo ngày gồm các cột dữ liệu
// -----Ngày thuê, số lượng phiếu, số lượng sách
// ---Báo cáo theo tháng
// -----Tháng thuê, số lượng phiếu, số lượng sách
// ---Báo cáo sách
// -----Tháng thuê, tên sách, số lượng được thuê
// -----Sắp xếp theo số lượng được thuê giảm dần

// Danh sách sách
Route::get("/viewSach", function(){
    $sachs = DB::table("saches")->get();
    return view("viewSach", compact(['sachs']));
})->name("viewsach");

// Danh sách thuê sách
Route::get("/viewThueSach", function(){
    $thueSachs = DB::table("thuesaches")->get();
    return view("viewThueSach", compact(['thueSachs']));
})->name("thuesach");

// Chi tiết thuê sách
Route::get("/viewChiTietThueSach/{id}", function($id){
    $ctThueSach = DB::table("thuesaches")->where("id", $id)->get();
    $sach = DB::table("saches")->pluck("tensach", "id");
    return view("viewChiTietThueSach", compact(['ctThueSach', 'sach']));
})->name("ctthuesach");

// ---Báo cáo theo ngày
Route::get("/viewThueSachNgay", function(Request $request){
    $search = $request->search;
    $thueNgay = DB::table("thuesaches")->whereDay('ngay_thue', $search)->get();
    $phieuNgay = DB::table("thuesaches")->whereDay('ngay_thue', $search)->count();
    $sachNgay = DB::table("thuesaches")->whereDay('ngay_thue', $search)->sum("soluong_thue");
    return view("viewSachNgay", compact(['thueNgay', 'phieuNgay', 'sachNgay']));
})->name("viewsachngay");

// ---Báo cáo theo thang
Route::get("/viewThueSachThang", function(Request $request){
    $search = $request->search;
    $thueThang = DB::table("thuesaches")->whereMonth('ngay_thue', $search)->get();
    $phieuThang = DB::table("thuesaches")->whereMonth('ngay_thue', $search)->count();
    $sachThang = DB::table("thuesaches")->whereMonth('ngay_thue', $search)->sum("soluong_thue");
    return view("viewSachThang", compact(['thueThang', 'phieuThang', 'sachThang']));
})->name("viewsachthang");

// ---Báo cáo sách
Route::get("/viewBaoCaoSach", function(Request $request){
    $search = $request->search;
    $sachThang = DB::table('saches')
                    ->leftJoin('thuesaches', 'saches.id', '=', 'thuesaches.idsach_thue')
                    ->select('thuesaches.nguoi_thue', 'thuesaches.soluong_thue')
                    ->whereMonth('ngay_thue', $search)
                    ->orderByDesc('thuesaches.soluong_thue')
                    ->get();
    return view("viewBaoCaoSach", compact(['sachThang']));         
})->name("viewbaocaosach");

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
