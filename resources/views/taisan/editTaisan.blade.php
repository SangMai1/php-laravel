<form method=post action="{{ route('updatetaisan', [$taisan->id])}}">
  @csrf
  <input type="hidden" name="id" value="{{$taisan->id}}"><br>
  Name :<input type="text" name="name" value="{{$taisan->name}}"><br>
  Chung loai:

  <select name="id_chungloai">
    @foreach($chungloaiId as $key => $value)
    <option value="{{$key}}" {{($key == $taisan->id_chungloai) ? 'selected' : ''}}>{{$value}}</option>
    @endforeach
  </select><br>

  Nguoi dung:

  <select name="id_nguoidung">
    @foreach($nguoidungId as $key => $value)
    <option value="{{$key}}" {{($key == $taisan->id_nguoidung) ? 'selected' : ''}}>{{$value}}</option>
    @endforeach
  </select><br>
  <button type="submit">Cap nhat</button>
</form>