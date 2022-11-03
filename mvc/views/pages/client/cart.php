<main class="wp-content">
    <div class="breadcrumb_content mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav>
                        <ol class="breadcrumb-list breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="info-cart mb-5">
        <div class="table-responsive">
            <form action="" method="post">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($_SESSION['cart'])) {
                            $sum = 0;
                            foreach ($_SESSION['cart'] as $cart) {
                                $sum += (int)$cart['total'];
                        ?>
                                <tr>
                                    <th scope="row">
                                        <img width="100px" src="<?= _IMG_PRODUCT_PATH . $cart['image'] ?>" alt="">
                                    </th>
                                    <td><?= $cart['name'] ?></td>
                                    <td><?= format_money($cart['price']) ?></td>
                                    <td><?= $cart['number'] ?></td>
                                    <td><?= format_money($cart['total']) ?></td>
                                    <td>
                                        <div class="btn_group">
                                            <button data-id="<?= $cart['id'] ?>" data-url="<?= _WEB_ROOT_PATH . '/ajax' ?>" class="btn_remove btn btn-danger" type="submit">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6">
                                <div class="total-price float-right">
                                    <b class="display-5 cart_total_price">Total Price: <span><?= format_money($sum) ?></span></b>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <div class="float-right">
                                    <a href="<?= _WEB_ROOT_PATH . "/checkout" ?>" class="btn btn-lg btn-outline-dark px-5 py-4 ml-3">Checkout</a>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>

            </form>
        </div>
    </div>

</main>