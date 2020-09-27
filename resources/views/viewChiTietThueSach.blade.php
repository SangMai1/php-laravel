<form method=get>
  <table>
    <tr>
      <th>Id</th>
      <th>Nguoi thue</th>
      <th>Sach thue</th>
      <th>So luong thue</th>
      <th>Ngay thue</th>
    </tr>
    @foreach($ctThueSach as $re1)
    <tr>
      <td>
        {{$re1->id}}
      </td>
      <td>
        {{$re1->nguoi_thue}}
      </td>
      <td>
        {{$sach[$re1->idsach_thue] ?? ""}}
      </td>
      <td>
        {{$re1->soluong_thue}}
      </td>
      <td>
        {{$re1->ngay_thue}}
      </td>

    </tr>
    @endforeach
  </table>
</form>