
<div class="mb-3">
    <form class="form_bill form-inline " action="" method="POST">
        <div class="">
            <select name="status" id="bill" class="custom-select select-status" required>
                <option value="-1">Select....</option>
                <option value="0">Processing</option>
                <option value="1">In transit</option>
                <option value="2">Delivered</option>
            </select>
            <input type="text" class="input_bill form-control" id="exampleFormControlInput1" placeholder="Search" name="keyword_bill">
            <input type="hidden" name="search" value="search">
            <button type="submit" class="btn btn-primary px-4">
                <i class="fas fa-search "></i>
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
<table class="table table_bill table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Info guest</th>
            <th scope="col">Info bill</th>
            <th scope="col">Status</th>
            <th scope="col">Method</th>
            <th scope="col">Created at</th>
            <th class="text-center" scope="col">Edit</th>
            <th class="text-center" scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($data['billsNew'])) {
            foreach ($data['billsNew'] as $guest) {
                // show_array($guest);
                $sum = 0;
        ?>
                <tr>
                    <td class="" scope="row"><?php echo $guest['id'] ?></td>
                    <td class="">
                        <?= $guest['fullname'] ?> <br> 
                        <?= $guest['phone'] ?> <br>
                        <?= $guest['email'] ?> <br>
                        <?= $guest['address'] ?> <br>
                    </td>
                    <td class="">
                        <?php
                        // show_array($guest['detail']);
                        foreach ($guest['detail'] as $bill) {
                            $sum += $bill['total'];
                            ?>
                            <?= $bill['name_pro']?> x <?= $bill['number'] ?><br>
                            
                            <?php
                        }
                        
                        ?>
                        <?='Total:' . format_money($sum) ?>
                    </td>
                    <td><?= getStatusBill($guest['status']) ?></td>
                    <td><?= $guest['method'] ?></td>
                     <td><?php echo $guest['created_at'] ?></td>
                    <td class="text-center">
                        <a class="btn btn-info <?php if($guest['status'] >= 2) echo "disabled" ?>" href="<?php echo _WEB_ROOT_PATH . '/Bill/update_bill/' . $guest['id'] ?>"><i class="fas fa-shipping-fast"></i></a>
                    </td>
                    <td class=" text-center"><a class="handle_delete btn btn-danger" href="<?php echo _WEB_ROOT_PATH . '/Bill/delete_bill/' . $guest['id'] ?>"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
            <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="8" class="text-center">NO DATA...</td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>