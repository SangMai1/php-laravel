<form method="post" action="<?= route("themdausach") ?>">
  @csrf
  Id :<input type="text" name="id"><br>
  Ten sach :<input type="text" name="name"><br>
  Gia :<input type="text" name="gia"><br>
  Lop :
  <select name="lop">
    @foreach($idLop as $key => $value)
    <option value="{{$key}}">{{$value}}</option>
    @endforeach
  </select>
  <br>
  <button type="submit">Submit</button>
</form>