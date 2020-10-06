<form method=get>
  <table>
    <tr>
      <th>Cap hoc</th>
      <th>Lop hoc</th>
      <th>Ngay</th>
      <th>Tong</th>
    </tr>
    @for( $i = 0; $i < count($sachKickhoat); $i++) <tr>
      <td>
        {{$sachKickhoat[$i]->caphoc}}
      </td>
      <td>
        {{$sachKickhoat[$i]->lophoc}}
      </td>
      <td>
        {{$sachKickhoat[$i]->ngay_dung}}
      </td>
      <td>
        {{$sachKickhoat[$i]->count}}
      </td>

      </tr>
      @endfor
  </table>
</form>