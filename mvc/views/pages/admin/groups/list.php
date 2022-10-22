<a class="btn btn-primary mb-3" href="<?= _WEB_ROOT_PATH . '/group/add_group' ?>">
  Add user group
</a>
<div class="mb-3">
  <form class="input form_group form-inline " action="" method="POST">
    <div class="">
      <input type="text" class="input_group form-control" id="exampleFormControlInput1" placeholder="Search" name="keyword_group">
      <input type="hidden" name="search" value="search">
      <button type="submit" class="btn btn-sm btn-primary">
        <i class="fas fa-search px-3 py-2"></i>
      </button>
    </div>
  </form>
</div>
<style>
    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 50px;
        height: 50px;
        -webkit-animation: spin 2s linear infinite;
        /* Safari */
        animation: spin 0.7s linear infinite;
        display: none;
    }

    /* Safari */
    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
<?php
if (isset($_SESSION['msg']) && $_SESSION['msg'] != '') {
?>
  <div class="alert alert-success" role="alert">
    <?php echo $_SESSION['msg'] ?>
  </div>
<?php
  $_SESSION['msg'] = '';
}
?>
<div class="text-center d-flex justify-content-center">
    <div class="loader"></div>
</div>
<table class="table table_group">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Usergroup</th>
      <th scope="col">Created_at</th>
      <th scope="col">Updated_at</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if (!empty($data['groups'])) {
      foreach ($data['groups'] as $group) {
    ?>
        <tr>
          <td><?= $group['id'] ?></td>
          <td><?= $group['name'] ?></td>
          <td><?= $group['created_at'] ?></td>
          <td><?= $group['updated_at'] ?></td>
          <td><a class="btn btn-outline-primary" href="<?= _WEB_ROOT_PATH . "/group/update_group/" . $group['id'] ?>"><i class="far fa-edit"></i></a></td>
          <td><a class="handle_delete btn btn-outline-danger" href="<?= _WEB_ROOT_PATH . "/group/delete_group/" . $group['id'] ?>"><i class="fas fa-trash-alt"></i></a></td>
        </tr>
    <?php
      }
    }
    ?>
  </tbody>
</table>