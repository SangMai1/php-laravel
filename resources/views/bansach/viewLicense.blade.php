<form method=get action="<?= route("viewlicense") ?>">
  <table>
    <tr>
      <th>Id</th>
      <th>Sach</th>
      <th>Trang thai</th>
      <th>Ngay dung</th>
      <th>Select</th>
    </tr>
    @foreach($licenses as $re1)
    <tr>
      <td>
        {{$re1->id}}
      </td>
      <td>
        {{$sach[$re1->sach] ?? ""}}
      </td>
      <td>
        {{$re1->trang_thai}}
      </td>
      <td>
        {{$re1->ngay_dung}}
      </td>
      <td>
        <a href="{{ route('editlicense1',[$re1->id]) }}">Edit</a>
        <a href="{{ route('dellicense',[$re1->id]) }}">Delete</a>
      </td>

    </tr>
    @endforeach
  </table>
</form>