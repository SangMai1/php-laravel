<form method="post" action="<?= route("store") ?>">
  @csrf
  Id :<input type="text" name="id"><br>
  Ten sach :<input type="text" name="tensach"><br>
  So luong : <input type="text" name="soluong"><br>

  <button type="submit">Submit</button>
</form>