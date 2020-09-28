<form method="post" action="<?= route("addThueSach") ?>">
  @csrf
  Id :<input type="text" name="id"><br>
  Nguoi thue :<input type="text" name="nguoi_thue"><br>
  So luong thue : <input type="text" name="soluong_thue"><br>
  Ngay thue : <input type="date" name="ngay_thue"><br>
  Loai sach :
  <select name="idsach_thue">
    @foreach($idSach as $key => $value)
    <option value="{{$key}}">{{$value}}</option>
    @endforeach
  </select>
  <br>
  <button type="submit">Submit</button>
</form>