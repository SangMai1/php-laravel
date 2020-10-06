<form method=post action="{{ route('editdausach2', [$dausach -> id])}}">
  @csrf
  <input type="hidden" name="id" value="{{$dausach->id}}"><br>
  Ten sach :<input type="text" name="name" value="{{$dausach->name}}"><br>
  Gia :<input type="text" name="gia" value="{{$dausach->gia}}"><br>
  Lop:

  <select name="lop">
    @foreach($lop as $key => $value)
    <option value="{{$key}}" {{($key == $dausach->lop) ? 'selected' : ''}}>{{$value}}</option>
    @endforeach
  </select><br>

  <button type="submit">Cap nhat</button>
</form>