<form method="post" action="<?= route("store") ?>">
  @csrf
  Id :<input type="text" name="id"><br>
  Ten sach :<input type="text" name="name"><br>

  <button type="submit">Submit</button>
</form>