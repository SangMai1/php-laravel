<form method="post" action=" {{ route('editThueSach',[$thueSachs->id])}}">
  @csrf
  Id :<input type="text" name="id" value={{$thueSachs->id}}><br>
  Nguoi thue :<input type="text" name="nguoi_thue" value={{$thueSachs->nguoi_thue}}><br>
  So luong thue : <input type="text" name="soluong_thue" value={{$thueSachs->soluong_thue}}><br>
  Ngay thue : <input type="text" name="ngay_thue" value={{$thueSachs->ngay_thue}}><br>
  Loai sach :
  <select name="idsach_thue">
    @foreach($sachId as $key => $value)
    <option value="{{$key}}" {{($key == $thueSachs->idsach_thue) ? 'selected' : ''}}>{{$value}}</option>
    @endforeach
  </select>
  <br>
  <button type="submit">Submit</button>
</form>