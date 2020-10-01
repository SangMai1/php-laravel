<form method=get action="<?= route("viewnhacungcap") ?>">
  <table>
    <tr>
      <th>Id</th>
      <th>Name</th>
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
        <a href="{{ route('editnhacungcap',[$re->id]) }}">Edit</a>
        <a href="{{ route('del11111',[$re->id]) }}">Delete</a>
      </td>
    </tr>
    @endforeach
  </table>
</form>