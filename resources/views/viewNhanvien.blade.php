
<form method=get action="<?= route("viewnhanvien") ?>">
  <table>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Id phong ban</th>
      <th>Select</th>
    </tr>
    @foreach($result as $re)
    <tr>
      <td>
        {{$re['id']}}
      </td>
      <td>
        {{$re['name']}}
      </td>
      <td>
        {{$phongban[$re->id_phongban] ?? ""}}
      </td>
      <td>
        <a href="{{ route('editnhanvien',[$re->id]) }}">Edit</a>
        <a href="#">Delete</a>
      </td>
    </tr>
    @endforeach
  </table>
</form>