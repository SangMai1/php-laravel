<form method="post" action="<?= route("themnhanvien") ?>">
  @csrf
  Id :<input type="text" name="id"><br>
  Name :<input type="text" name="name"><br>
  Phong ban :
  <select name="id_phongban">
    @foreach($idPhongban as $key => $value)
    <option value="{{$key}}">{{$value}}</option>
    @endforeach
  </select>
  <br>
  <button type="submit">Submit</button>
</form>