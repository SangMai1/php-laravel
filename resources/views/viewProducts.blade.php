<form method="get" action="{{route('viewproductsngay')}}">
  <label>Tim kiem theo ngay</label>
  <input type="text" name="search">
  <button type="submit">Tim kiem</button>
</form>
<form method="get" action="{{route('viewmoneyngay')}}">
  <label>Tim kiem so tien ban theo ngay</label>
  <input type="text" name="search">
  <button type="submit">Tim kiem</button>
</form>
<form method="get" action="{{route('viewdonngay')}}">
  <label>Tim kiem so tien ban theo ngay</label>
  <input type="text" name="search">
  <button type="submit">Tim kiem</button>
</form>
<form method=get action="<?= route("viewproducts") ?>">

  <table>
    <tr>
      <th>Id</th>
      <th>Ten hang</th>
      <th>So luong</th>
      <th>Don gia</th>
      <th>Thanh tien</th>
      <th>Ngay ban</th>
    </tr>
    @foreach($products as $re)
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