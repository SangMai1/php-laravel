<form method=get action="<?= route("viewchucnang") ?>">
  <table>
    <tr>
      <th>Id</th>
      <th>Name</th>
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
        <a href="#">Edit</a>
        <a href="#">Delete</a>
      </td>
    </tr>
    @endforeach
  </table>
</form>