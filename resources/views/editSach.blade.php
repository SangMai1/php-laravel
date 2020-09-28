<form method="post" action=" {{ route('editSach2',[$sache->id])}}">
  @csrf
  Id :<input type="hide" name="id" value={{$sache->id}}><br>
  Ten sach :<input type="text" name="tensach" value={{$sache->tensach}}><br>
  So luong : <input type="text" name="soluong" value={{$sache->soluong}}><br>

  <button type="submit">Submit</button>
</form>