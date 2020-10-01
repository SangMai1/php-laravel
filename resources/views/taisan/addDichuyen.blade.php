<form method="post" action="<?= route("themdichuyen") ?>">
  @csrf
  Id :<input type="text" name="id"><br>
  Id nguoi dung :
  <select name="id_nguoidung">
    @foreach($idNguoidung as $key => $value)
    <option value="{{$key}}">{{$value}}</option>
    @endforeach
  </select>
  <br>
  Id tai san :
  <select name="id_taisan">
    @foreach($idTaisan as $key => $value)
    <option value="{{$key}}">{{$value}}</option>
    @endforeach
  </select>
  <br>
  Ngay :<input type="date" name="ngay"><br>
  <button type="submit">Submit</button>
</form>