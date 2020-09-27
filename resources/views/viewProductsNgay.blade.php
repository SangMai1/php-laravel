<form method=get action="<?= route("viewproductsngay") ?>">

  <table>
    <tr>
      <th>Id</th>
      <th>Ten hang</th>
      <th>So luong</th>
      <th>Don gia</th>
      <th>Thanh tien</th>
      <th>Ngay ban</th>
    </tr>
    @foreach($productsNgay as $re)
    <tr>
      <td>
        {{$re->id}}
      </td>
      <td>
        {{$re->tenhang}}
      </td>
      <td>
        {{$re->soluong}}
      </td>
      <td>
        {{$re->dongia}}
      </td>
      <td>
        {{$re->thanhtien}}
      </td>
      <td>
        {{$re->ngayban}}
      </td>
    </tr>
    @endforeach
  </table>
</form>