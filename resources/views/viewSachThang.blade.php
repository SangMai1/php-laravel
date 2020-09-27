<form method=get action="<?= route("viewsachthang") ?>">

  <table>
    <tr>
      <th>So luong phieu</th>
      <th>So luong sach</th>
    </tr>
    <tr>
      <td>
        {{$phieuThang}}
      </td>
      <td>
        {{$sachThang}}
      </td>
    </tr>
  </table>
</form>