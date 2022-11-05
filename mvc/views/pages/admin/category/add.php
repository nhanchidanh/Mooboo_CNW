<?php
if (!empty($data['msg'])) {
    echo '<div class="alert alert-' . $data['type'] . '">' . $data['msg'] . '</div>';
}
?>
<form method="POST">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name category</label>
        <input type="text" class="form-control" name="categoryname" placeholder="Name category">
    </div>
    <input type="hidden" name="add_category" value="add_category">
    <button type="submit" class="btn btn-primary px-4">Add</button>
</form>