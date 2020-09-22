<form method=post action="{{ route('capnhat', [$userId -> id])}}">
  @csrf
  <input type="hidden" name="id" value="{{$userId->id}}"><br>
  Name :<input type="text" name="name" value="{{$userId->name}}"><br>
  Chuc danh:

  <select name="chucdanhid">
    <option>---</option>
    @foreach($chucdanhId as $key => $value)
    <option value="{{$key}}" {{($key == $userId->chucdanhid) ? 'selected' : ''}}>{{$value}}</option>
    @endforeach
  </select><br>
  Phong ban:

  <select name="phongbanid">
    <option>---</option>
    @foreach($phongbanId as $key => $value)
    <option value="{{$key}}" {{($key == $userId->phongbanid)? 'selected' : ''}}>{{$value}}</option>
    @endforeach
  </select><br>
  <button type="submit">Cap nhat</button>
</form>