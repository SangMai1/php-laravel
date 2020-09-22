<form method="post" action="{{ route('adduser') }}">
  @csrf
  Id :<input type="text" name="id"><br>
  Name :<input type="text" name="name"><br>
  Chuc danh:
  <select>
    @foreach($phongbanId as $key => $value)
    <option value="{{$key}}">{{$value}}</option>
    @endforeach
  </select>
  <button type="submit">Submit</button>
</form>