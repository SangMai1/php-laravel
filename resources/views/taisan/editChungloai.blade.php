<form method=post action="{{ route('updatechungloai', [$chungloai -> id])}}">
  @csrf
  <input type="hidden" name="id" value="{{$chungloai->id}}"><br>
  Name :<input type="text" name="name" value="{{$chungloai->name}}"><br>
  Nha cung cap:

  <select name="id_nhacungcap">
    @foreach($nhacungcap as $key => $value)
    <option value="{{$key}}" {{($key == $chungloai->id_nhacungcap) ? 'selected' : ''}}>{{$value}}</option>
    @endforeach
  </select><br>

  <button type="submit">Cap nhat</button>
</form>