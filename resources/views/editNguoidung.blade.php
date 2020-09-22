<form method=post action="{{ route('editPB',[$pb->id])}}">
  @csrf
  Id :<input type="text" name="id" value={{$pb->id}}>
  Name :<input type="text" name="name" value={{$pb->name}}>

  <button type="submit">Cap nhat</button>
</form>