<form method="get" action="{{route('findvao')}}">
  <label>Bao cao theo ngay</label><br>
  Ngay: <input type="text" name="nhanvien"><br>
  Id nhan vien: <input type="text" name="ngay"><br>
  <button type="submit">Tim kiem</button>
</form><br>
<form method="get" action="{{route('thongke')}}">
  <label>Bao cao theo thang</label><br>
  month: <input type="text" name="month"><br>
  year: <input type="text" name="year"><br>
  Id nhan vien: <input type="text" name="nhanvienId"><br>
  <button type="submit">Tim kiem</button>
</form>
<form method=get action="<?= route("viewvao") ?>">
  <table>
    <tr>
      <th>Id</th>
      <th>Id may quet</th>
      <th>Id nhan vien</th>
      <th>Ngay</th>
    </tr>
    @foreach($result as $re)
    <tr>
      <td>
        {{$re['id']}}
      </td>
      <td>
        {{$re['id_mayquet']}}
      </td>
      <td>
        {{$re['id_nhanvien']}}
      </td>
      <td>
        {{$re['created_at']}}
      </td>
    </tr>
    @endforeach
  </table>
</form>