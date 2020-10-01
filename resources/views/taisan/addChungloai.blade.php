<form method="post" action="<?= route("themchungloai") ?>">
  @csrf
  Id :<input type="text" name="id"><br>
  Nam :<input type="text" name="name"><br>
  Nha cung cap :
  <select name="id_nhacungcap">
    @foreach($idNhacungcap as $key => $value)
    <option value="{{$key}}">{{$value}}</option>
    @endforeach
  </select>
  <br>
  <button type="submit">Submit</button>
</form>