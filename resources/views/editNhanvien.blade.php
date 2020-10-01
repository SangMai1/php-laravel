<form method="post" action=" {{ route('updatenhanvien',[$nhanvien->id])}}">
  @csrf
  Id :<input type="hide" name="id" value={{$nhanvien->id}}><br>
  Nguoi thue :<input type="text" name="name" value={{$nhanvien->name}}><br>
  Phong ban :
  <select name="id_phongban">
    @foreach($phongbanId as $key => $value)
    <option value="{{$key}}" {{($key == $nhanvien->id_phongban) ? 'selected' : ''}}>{{$value}}</option>
    @endforeach
  </select>
  <br>
  <button type="submit">Submit</button>
</form>