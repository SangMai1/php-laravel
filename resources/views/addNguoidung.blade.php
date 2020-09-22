<form method="post" action="<?= route("addPB") ?>">
  @csrf
  Id :<input type="text" name="id">
  Name :<input type="text" name="name">

  <button type="submit">Submit</button>
</form>