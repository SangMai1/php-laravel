<form method=get action="<?= route("viewlophoc") ?>">
  <table>
    <tr>
      <th>Id</th>
      <th>Lop</th>
      <th>Cap</th>
      <th>Select</th>
    </tr>
    @foreach($lops as $re1)
    <tr>
      <td>
        {{$re1->id}}
      </td>
      <td>
        {{$re1->lop}}
      </td>
      <td>
        {{$cap[$re1->cap] ?? ""}}
      </td>
      <td>
        <a href="{{ route('editlophoc1',[$re1->id]) }}">Edit</a>
        <a href="{{ route('dellophoc',[$re1->id]) }}">Delete</a>
      </td>

    </tr>
    @endforeach
  </table>
</form>