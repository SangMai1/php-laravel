<form method=get action="<?= route("findvao") ?>">
  <table>
    <tr>
      <th>Id</th>
      <th>Id may quet</th>
      <th>Id nhan vien</th>
      <th>Ngay</th>
    </tr>
    @foreach($nhanvienNgay as $re)
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