<form method=post action="{{ route('updatenguoidung',[$nguoidung->id])}}">
  @csrf
  Id :<input type="text" name="id" value={{$nguoidung->id}}>
  Name :<input type="text" name="name" value={{$nguoidung->name}}>

  <button type="submit">Cap nhat</button>
</form>