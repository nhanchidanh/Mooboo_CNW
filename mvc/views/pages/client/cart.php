<main class="wp-content">
    <div class="breadcrumb_content mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav>
                        <ol class="breadcrumb-list breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="info-cart mb-5" data-aos="fade-up">
        <div class="container">
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
                        <tbody class="list_cart">

                            <?php
                            if (!empty($_SESSION['cart'])) {
                                $sum = 0;
                                foreach ($_SESSION['cart'] as $cart) {
                                    $sum += (int)$cart['total'];
                            ?>
                                    <tr class="item_cart" data-id="<?php echo $cart['id'] ?>">
                                        <th scope="row">
                                            <img width="100px" src="<?= _IMG_PRODUCT_PATH . $cart['image'] ?>" alt="">
                                        </th>
                                        <td>
                                            <a class="font-weight-bold text-decoration-none primary_color" href="<?= _WEB_ROOT_PATH . '/product_detail/product/' . $cart['id'] ?>"><?= $cart['name'] ?></a>
                                        </td>
                                        <td><?= format_money($cart['price']) ?></td>
                                        <td>
                                            <span class="btn btn-light" data-path="<?= _IMG_PRODUCT_PATH ?>" data-id="<?= $cart['id'] ?>" data-url="<?= _WEB_ROOT_PATH . '/ajax' ?>"><i class="decrease fa-solid fa-minus p-2"></i></span>
                                            <span class="number"> <?= $cart['number'] ?> </span>
                                            <span class="btn btn-light" data-path="<?= _IMG_PRODUCT_PATH ?>" data-id="<?= $cart['id'] ?>" data-url="<?= _WEB_ROOT_PATH . '/ajax' ?>"><i class="increase fa-solid fa-plus p-2"></i></span>
                                        </td>
                                        <td class="sum"><?= format_money($cart['total']) ?></td>
                                        <td>
                                            <div class="btn_group">
                                                <button data-id="<?= $cart['id'] ?>" data-url="<?= _WEB_ROOT_PATH . '/ajax' ?>" class="btn_remove btn btn-danger py-3 px-5" type="submit">Delete</button>
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
                                        <a href="<?= _WEB_ROOT_PATH . "/checkout" ?>" class="btn btn-lg btn-danger px-5 py-4 ml-3">Checkout</a>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>

                </form>
            </div>
        </div>
    </div>

</main>