<form method=get action="<?= route("viewbaocao") ?>">
  <table>
    <tr>
      <th>Id</th>
      <th>Id nguoi dung</th>
      <th>Id tai san</th>
      <th>Ngay</th>
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

    </tr>
    @endforeach
  </table>
</form>