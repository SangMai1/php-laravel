<form method="post" action=" {{ route('editCaphoc2',[$caphoc->id])}}">
  @csrf
  Id :<input type="hide" name="id" value={{$caphoc->id}}><br>
  Ten cap :<input type="text" name="name" value={{$caphoc->name}}><br>

  <button type="submit">Submit</button>
</form>