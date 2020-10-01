<form method=post action="{{ route('updatenhacungcap',[$nhacungcap->id])}}">
  @csrf
  Id :<input type="text" name="id" value={{$nhacungcap->id}}>
  Name :<input type="text" name="name" value={{$nhacungcap->name}}>

  <button type="submit">Cap nhat</button>
</form>