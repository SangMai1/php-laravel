<form method=get action="<?= route("viewdausach") ?>">
  <table>
    <tr>
      <th>Id</th>
      <th>Ten sach</th>
      <th>Gia</th>
      <th>Lop</th>
      <th>Select</th>
    </tr>
    @foreach($dausachs as $re1)
    <tr>
      <td>
        {{$re1->id}}
      </td>
      <td>
        {{$re1->name}}
      </td>
      <td>
        {{$re1->gia}}
      </td>
      <td>
        {{$lop[$re1->lop] ?? ""}}
      </td>
      <td>
        <a href="{{ route('editdausach1',[$re1->id]) }}">Edit</a>
        <a href="{{ route('deldausach',[$re1->id]) }}">Delete</a>
      </td>

    </tr>
    @endforeach
  </table>
</form>