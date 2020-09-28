<form method="get" action="{{route('viewbaocaosach')}}">
  <label>Bao cao sach</label>
  <input type="text" name="search">
  <button type="submit">Tim kiem</button>
</form>
<form method=get action="<?= route("viewsach") ?>">
  <table>
    <tr>
      <th>Id</th>
      <th>Ten sach</th>
      <th>Select</th>
    </tr>
    @foreach($sachs as $re)
    <tr>
      <td>
        {{$re->id}}
      </td>
      <td>
        {{$re->tensach}}
      </td>
      <td>
        <a href="{{ route('editSach1',[$re->id]) }}">Edit</a>
        <a href="{{ route('del11',[$re->id]) }}">Delete</a>
      </td>
    </tr>
    @endforeach
  </table>
</form>