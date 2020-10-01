<form method=get action="<?= route("viewtaisan") ?>">
  <table>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Chung loai</th>
      <th>Nguoi dung</th>
      <th>Select</th>
    </tr>
    @foreach($result as $re)
    <tr>
      <td>
        {{$re->id}}
      </td>
      <td>
        {{$re->name}}
      </td>
      <td>
        {{$chungloai[$re->id_chungloai] ?? ""}}
      </td>
      <td>
        {{$nguoidung[$re->id_nguoidung] ?? ""}}
      </td>
      <td>
        <a href="{{ route('edittaisan',[$re->id]) }}">Edit</a>
        <a href="{{ route('del1111111',[$re->id]) }}">Delete</a>
      </td>
    </tr>
    @endforeach
  </table>
</form>