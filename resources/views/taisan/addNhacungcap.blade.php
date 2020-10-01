<form method="post" action="<?= route("themnhacungcap") ?>">
  @csrf
  Id :<input type="text" name="id"><br>
  Name :<input type="text" name="name"><br>

  <button type="submit">Submit</button>
</form>