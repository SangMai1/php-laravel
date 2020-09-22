<form method=get action="<?= route("viewuser") ?>">
  <table>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Chuc danh</th>
      <th>Phong ban</th>
      <th>Select</th>
    </tr>
    @foreach($userArr as $re)
    <tr>
      <td>
        {{$re->id}}
      </td>
      <td>
        {{$re->name}}
      </td>
      <td>
        {{$chucdanh[$re->chucdanhid] ?? ""}}
      </td>
      <td>
        {{$phongban[$re->phongbanid] ?? ""}}
      </td>
      <td>
        <a href="{{ url('/update/'.$re->id) }}">Edit</a>
        <a href="{{ url('/del/'.$re->name) }}">Delete</a>
      </td>
    </tr>
    @endforeach
  </table>
</form>