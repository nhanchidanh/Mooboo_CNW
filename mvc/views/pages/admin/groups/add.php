<?php
if(!empty($data['msg'])) {
    echo '<div class="alert alert-'.$data['type'].'">'.$data['msg'].'</div>';
}
?>

<form method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name user group</label>
    <input required type="text" class="form-control" name="groupname" placeholder="Name user group">
  </div>
  <input type="hidden" name="add_group" value="add_group">
  <button type="submit" class="btn btn-primary px-4">Add</button>
</form>