<form method="get" action="{{route('viewbaocao')}}">
  <label>Id tai san</label>
  <input type="text" name="search">
  <button type="submit">Tim kiem</button>
</form>
<form method=get action="<?= route("viewdichuyen") ?>">
  <table>
    <tr>
      <th>Id</th>
      <th>Id nguoi dung</th>
      <th>Id tai san</th>
      <th>Ngay</th>
      <th>Select</th>
    </tr>
    @foreach($result as $re)
    <tr>
      <td>
        {{$re->id}}
      </td>
      <td>
        {{$nguoidung[$re->id_nguoidung] ?? ""}}
      </td>
      <td>
        {{$taisan[$re->id_taisan] ?? ""}}
      </td>
      <td>
        {{$re->ngay}}
      </td>
      <td>
        <a href="{{ route('editdichuyen',[$re->id]) }}">Edit</a>
        <a href="{{ route('del11111111',[$re->id]) }}">Delete</a>
      </td>
    </tr>
    @endforeach
  </table>
</form>