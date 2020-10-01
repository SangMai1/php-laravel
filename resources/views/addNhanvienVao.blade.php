<form method="post" action="<?= route("themvao") ?>">
  @csrf
  Id :<input type="text" name="id"><br>
  May quet :
  <select name="id_mayquet">
    @foreach($may as $key => $value)
    <option value="{{$key}}">{{$value}}</option>
    @endforeach
  </select><br>
  Id nhan vien : <input type="text" name="id_nhanvien"><br>
  Ngay : <input type="date" name="ngay_gio">
  <br>
  <button type="submit">Submit</button>
</form>