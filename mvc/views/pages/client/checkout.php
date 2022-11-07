<main class="wp-content">
    <div class="container">
        <div class="section-checkout pt-5">
            <div class="section-head">
                <h2 class="section-title display-4">PAYMENT</h2>
            </div>
            <div class="section-detail mt-4">
                <div class="wp-section-detail mb-5">
                    <form id="form" action="<?= _WEB_ROOT_PATH . '/bill/add_bill' ?>" method="post">
                        <div class="row">
                            <div class="col-md-7" data-aos="fade-right">
                                <h2 class="title">Info user</h2>
                                <hr>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="fullname">Fullname</label>
                                        <input type="text" value="<?= $_SESSION['user']['name'] ?? '' ?>" class="form-control" name="fullname" id="fullname">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" value="<?= $_SESSION['user']['email'] ?? '' ?>" class="form-control" name="email" id="email">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="address">Address</label>
                                        <input type="text" value="<?= $_SESSION['user']['address'] ?? '' ?>" class="form-control" name="address" id="address" placeholder="1234 Main St">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">Phone</label>
                                        <input type="text" value="<?= $_SESSION['user']['phone'] ?? '' ?>" class="form-control" name="phone" id="phone" placeholder="0987654321">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="note">Note</label>
                                    <textarea id="note" value="<?= $_SESSION['user']['note'] ?? '' ?>" class="form-control" name="note" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-5" data-aos="fade-left">
                                <h2 class="title">Info Order</h2>
                                <div class="detail-info">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Product</th>
                                                <th scope="col">SubTotal</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!empty($_SESSION['cart'])) {
                                                $sum = 0;
                                                foreach ($_SESSION['cart'] as $cart) {
                                                    $sum += (int)$cart['total'];
                                            ?>
                                                    <tr class="card-item">
                                                        <td class="product-name" scope="row"><?= $cart['name'] ?> <b class="product-quantity">x <?= $cart['number'] ?></b></td>
                                                        <td class="product-total"><?= format_money($cart['total']) ?></td>
                                                        <input type="hidden" name="total" value="<?= $cart['total'] ?>">
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>


                                            <tr>
                                                <th scope="row">Total</th>
                                                <td colspan="2"><?= format_money($sum) ?></td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="payment-checkout-wp">
                                    <div class="form-check form-check-inline d-block">
                                        <input id="home-payment" checked class="form-check-input" type="radio" name="method" value="home-payment">
                                        <label for="home-payment" class="form-check-label">Home Payment</label>
                                    </div>
                                    <div class="form-check form-check-inline d-block my-4">
                                        <input id="online-payment" checked class="form-check-input" type="radio" name="method" value="online-payment">
                                        <label for="online-payment" class="form-check-label">Online Payment</label>
                                    </div>
                                </div>
                                <div class="btn-order mt-3">
                                    <button name="add_bill" value="add_bill" class="btn btn-danger py-3 px-5" type="submit">Pay Now</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>