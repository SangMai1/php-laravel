<form method=get action="<?= route("viewcaphoc") ?>">
  <table>
    <tr>
      <th>Id</th>
      <th>Cấp học</th>
      <th>Select</th>
    </tr>
    @foreach($caphocs as $re)
    <tr>
      <td>
        {{$re->id}}
      </td>
      <td>
        {{$re->name}}
      </td>
      <td>
        <a href="{{ route('editCaphoc1',[$re->id]) }}">Edit</a>
        <a href="{{ route('delCaphoc',[$re->id]) }}">Delete</a>
      </td>
    </tr>
    @endforeach
  </table>
</form>