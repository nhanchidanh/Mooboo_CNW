<?php
if(!empty($data['msg'])) {
    echo '<div class="alert alert-'.$data['type'].'">'.$data['msg'].'</div>';
}
?>
<form method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name user group</label>
    <input type="text" class="form-control" name="groupname" placeholder="Name user group" value="<?php echo $data['group']['name'] ?>">
  </div>
  <input type="hidden" name="update_group" value="update_group">
  <button type="submit" class="btn btn-primary">Update</button>
</form>