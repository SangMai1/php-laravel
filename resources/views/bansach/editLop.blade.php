<form method=post action="{{ route('editlophoc2', [$lop -> id])}}">
  @csrf
  <input type="hidden" name="id" value="{{$lop->id}}"><br>
  Name :<input type="text" name="lop" value="{{$lop->lop}}"><br>
  Nha cung cap:

  <select name="cap">
    @foreach($cap as $key => $value)
    <option value="{{$key}}" {{($key == $lop->cap) ? 'selected' : ''}}>{{$value}}</option>
    @endforeach
  </select><br>

  <button type="submit">Cap nhat</button>
</form>