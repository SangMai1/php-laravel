<form method=get action="<?= route("viewsachngay") ?>">

  <table>
    <tr>
      <th>So luong phieu</th>
      <th>So luong sach</th>
    </tr>
    <tr>
      <td>
        {{$phieuNgay}}
      </td>
      <td>
        {{$sachNgay}}
      </td>
    </tr>
  </table>
</form>