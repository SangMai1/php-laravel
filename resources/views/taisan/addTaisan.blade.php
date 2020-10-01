<form method="post" action="<?= route("themtaisan") ?>">
  @csrf
  Id :<input type="text" name="id"><br>
  Nam :<input type="text" name="name"><br>
  Chung loai :
  <select name="id_chungloai">
    @foreach($idChungloai as $key => $value)
    <option value="{{$key}}">{{$value}}</option>
    @endforeach
  </select>
  <br>
  Nguoi dung :
  <select name="id_nguoidung">
    @foreach($idNguoidung as $key => $value)
    <option value="{{$key}}">{{$value}}</option>
    @endforeach
  </select>
  <br>
  <button type="submit">Submit</button>
</form>