<form method="post" action="<?= route("themlop") ?>">
  @csrf
  Id :<input type="text" name="id"><br>
  Lop :<input type="text" name="lop"><br>
  Cap :
  <select name="cap">
    @foreach($idCap as $key => $value)
    <option value="{{$key}}">{{$value}}</option>
    @endforeach
  </select>
  <br>
  <button type="submit">Submit</button>
</form>