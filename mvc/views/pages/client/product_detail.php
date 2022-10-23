<main class="wp-content">
    <div class="breadcrumb_content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav>
                        <ol class="breadcrumb-list breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= _WEB_ROOT_PATH ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= _WEB_ROOT_PATH . '/product/show_product' ?>">Products</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $data['product']['name'] ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="wp-product-details">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="product-details-img">
                        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="<?= _IMG_PRODUCT_PATH . $data['product']['image'] ?>" />
                                </div>

                                <?php
                                foreach ($data['image_product'] as $img_product) {
                                ?>
                                    <div class="swiper-slide">
                                        <img src="<?= _IMG_PRODUCT_PATH . $img_product['image'] ?>" />
                                    </div>
                                <?php
                                }
                                ?>


                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                        <div thumbsSlider="" class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="<?= _IMG_PRODUCT_PATH . $data['product']['image'] ?>" />
                                </div>
                                <?php
                                foreach ($data['image_product'] as $img_product) {
                                ?>
                                    <div class="swiper-slide">
                                        <img src="<?= _IMG_PRODUCT_PATH . $img_product['image'] ?>" />
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="product-content">
                        <form action="" method="post" class="product-content-form">
                            <h1 class="product-title"><?= $data['product']['name'] ?></h1>
                            <div class="rating-box">
                                <span class="rating-star mb-3">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star-half-stroke"></i>
                                    <i class="fa-regular fa-star"></i>
                                </span>
                            </div>
                            <div class="product-inventory">
                                <span class="inventory-title">Kho:</span>
                                <span class="variant-inventory">4 sản phẩm.</span>
                            </div>
                            <div class="product_price">
                                <span class="current_price"><?= format_money($data['product']['price']) ?></span>
                            </div>
                            <div class="product-quantity">
                                <label for="quantity">Số lượng: </label>
                                <input type="text" value="1" id="quantity" name="quantity" class="quantity-input text-center w-25 ">
                            </div>
                            <div class="btn-submit">
                                <button class="btn btn-buy" type="submit">BUY NOW</button>
                                <button class="btn btn-add-cart" type="submit">ADD TO CART</button>
                            </div>
                        </form>
                        <div class="product_desc">
                            <p><?= $data['product']['description'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>