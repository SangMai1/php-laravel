<form method=get action="<?= route("viewnguoidung") ?>">
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
        <a href="{{ url('/update1/'.$re['id']) }}">Edit</a>
        <a href="{{ url('/del/'.$re['id']) }}">Delete</a>
      </td>
    </tr>
    @endforeach
  </table>
</form>