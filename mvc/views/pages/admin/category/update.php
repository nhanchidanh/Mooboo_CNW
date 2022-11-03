<?php
if(!empty($data['msg'])) {
    echo '<div class="alert alert-'.$data['type'].'">'.$data['msg'].'</div>';
}
?>
<form method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name category</label>
    <input type="text" class="form-control" name="categoryname" placeholder="Name category" value="<?php echo $data['category']['name'] ?>">
  </div>
  <input type="hidden" name="update_category" value="update_category">
  <button type="submit" class="btn btn-primary">Update</button>
</form>