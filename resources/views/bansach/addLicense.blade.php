<form method="post" action="<?= route("themlicense") ?>">
  @csrf
  Id :<input type="text" name="id"><br>
  Sach :
  <select name="sach">
    @foreach($idSach as $key => $value)
    <option value="{{$key}}">{{$value}}</option>
    @endforeach
  </select><br>
  <div class="form-group">
    <label>Trạng thái :</label>
    <div class="radio">
      <label class="checkbox-inline">
        <input type="radio" name="trang_thai" checked="checked" value="1" id="trangthai1">Đã dùng</label>
      <label class="checkbox-inline">
        <input type="radio" name="trang_thai" value="0" id="trangthai2">Chưa dùng</label>
    </div>
  </div>
  Ngay dung :<input type="date" name="ngay_dung"><br>
  <br>
  <button type="submit">Submit</button>
</form>