<?php
if (!empty($data['msg'])) {
  echo '<div class="alert alert-' . $data['type'] . '">' . $data['msg'] . '</div>';
}
?>

<form method="POST" action="<?php echo _WEB_ROOT_PATH . '/user/add_user' ?>" enctype="multipart/form-data">
  <div class="row">
    <div class="mb-3 col-span-6 col-6">
      <label for="exampleInputEmail1" class="form-label">Name user</label>
      <input type="text" required class="form-control" name="username" placeholder="Name user">
    </div>
    <div class="mb-3 col-span-6  col-6" id="image-upload">
      <label for="image" class="form-label  justify-center" id="upload-img">
        <span>Avatar</span>
      </label>
      <input type="file" id="image" class="form-control hidden" name="avatar" onchange="readURL(this);">
    </div>
    <div class="mb-3 col-span-6 col-6">
      <label for="exampleInputEmail1" class="form-label">User group</label>
      <select required name="group" id="groupuser" class="custom-select" required>
        <option>Select....</option>
        <?php
        foreach ($data['groups'] as $group) {
        ?>
          <option value="<?php echo $group['id'] ?>"><?php echo $group['name'] ?></option>
        <?php
        }
        ?>
      </select>
    </div>
    <div class="mb-3 col-span-6 col-6">
      <label for="exampleInputEmail1" class="form-label">Email</label>
      <input required type="email" class="form-control" name="email" placeholder="example@gmail.com">
    </div>
    <div class="mb-3 col-span-6 col-6">
      <label for="exampleInputEmail1" class="form-label">Password</label>
      <input required type="password" class="form-control" name="password" placeholder="Password">
    </div>
    <div class="mb-3 col-span-6 col-6">
      <label for="exampleInputEmail1" class="form-label">Phone</label>
      <input required type="text" class="form-control" name="phone" placeholder="Phone">
    </div>
    <div class="mb-3 col-span-6 col-6">
      <label for="exampleInputEmail1" class="form-label">Address</label>
      <textarea required rows="4" type="text" class="form-control" name="address" placeholder="Address"></textarea>
    </div>
    <div class="mb-3 col-span-6 col-6">
      <label for="exampleInputEmail1" class="form-label">Description</label>
      <textarea rows="4" type="text" class="form-control" name="description" placeholder="Description"></textarea>
    </div>
  </div>
  <input type="hidden" name="add_user" value="add_user">
  <button type="submit" class="btn btn-primary  mb-3 ml-2 px-4">Add</button>
</form>