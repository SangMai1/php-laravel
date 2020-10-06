<form method=post action="{{ route('editlicense2', [$license -> id])}}">
  @csrf
  <input type="hidden" name="id" value="{{$license->id}}"><br>

  Sach:
  <select name="sach">
    @foreach($sach as $key => $value)
    <option value="{{$key}}" {{($key == $license->sach) ? 'selected' : ''}}>{{$value}}</option>
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
  Ngay dung :<input type="date" name="ngay_dung" value="{{$license->ngay_dung}}"><br>
  <button type="submit">Cap nhat</button>
</form>