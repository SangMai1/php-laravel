<form method=get action="<?= route("viewbaocaosach") ?>">
  <table>
    <tr>
      <th>Nguoi thue</th>
      <th>So luong thue</th>
    </tr>
    @foreach($sachThang as $re)
    <tr>
      <td>
        {{$re->nguoi_thue}}
      </td>
      <td>
        {{$re->soluong_thue}}
      </td>

    </tr>
    @endforeach
  </table>
</form>