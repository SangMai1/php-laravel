<form method="get" action="{{route('viewsachngay')}}">
  <label>Bao cao theo ngay</label>
  <input type="text" name="search">
  <button type="submit">Tim kiem</button>
</form>
<form method="get" action="{{route('viewsachthang')}}">
  <label>Bao cao theo thang</label>
  <input type="text" name="search">
  <button type="submit">Tim kiem</button>
</form>
<form method=get action="<?= route("thuesach") ?>">
  <table>
    <tr>
      <th>Id</th>
      <th>Nguoi thue</th>
      <th>Select</th>
    </tr>
    @foreach($thueSachs as $re)
    <tr>
      <td>
        {{$re->id}}
      </td>
      <td>
        {{$re->nguoi_thue}}
      </td>
      <td>
        <a href="{{url('/viewChiTietThueSach/'. $re->id)}}">Chi tiet</a>
      </td>
    </tr>
    @endforeach
  </table>
</form>