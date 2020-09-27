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

    </tr>
    @foreach($sachs as $re)
    <tr>
      <td>
        {{$re->id}}
      </td>
      <td>
        {{$re->tensach}}
      </td>
    </tr>
    @endforeach
  </table>
</form>