<form method=post action="{{ route('updatedichuyen', [$dichuyen->id])}}">
  @csrf
  <input type="hidden" name="id" value="{{$dichuyen->id}}"><br>

  Id nguoi dung:

  <select name="id_nguoidung">
    @foreach($nguoidungId as $key => $value)
    <option value="{{$key}}" {{($key == $dichuyen->id_nguoidung) ? 'selected' : ''}}>{{$value}}</option>
    @endforeach
  </select><br>

  Nguoi dung:

  <select name="id_taisan">
    @foreach($taisanId as $key => $value)
    <option value="{{$key}}" {{($key == $dichuyen->id_taisan) ? 'selected' : ''}}>{{$value}}</option>
    @endforeach
  </select><br>
  Ngay :<input type="date" name="ngay" value="{{$dichuyen->ngay}}"><br>
  <button type="submit">Cap nhat</button>
</form>