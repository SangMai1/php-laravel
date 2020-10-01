<form method=get action="<?= route("viewchungloai") ?>">
  <table>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Nha cung cap</th>
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
        {{$nhacungcap[$re->id_nhacungcap] ?? ""}}
      </td>

      <td>
        <a href="{{ route('editchungloai',[$re->id]) }}">Edit</a>
        <a href="{{ route('del11111',[$re->id]) }}">Delete</a>
      </td>
    </tr>
    @endforeach
  </table>
</form>