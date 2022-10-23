<main class="wp-content">
   <div class="slider-banner">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-8">
               <div id="home-slide" class="slider carousel slide carousel-fade" data-ride="carousel">
                  <ol class="carousel-indicators">
                     <li data-target="#home-slide" data-slide-to="0" class="active"></li>
                     <li data-target="#home-slide" data-slide-to="1"></li>
                     <li data-target="#home-slide" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                     <div class="carousel-item active" data-interval="3000">
                        <img src="https://cdn.shopify.com/s/files/1/0162/4018/1312/files/slider10.jpg?v=1547273083" class="carousel-img w-100 d-block" alt="slider">
                        <div class="carousel-caption d-none d-md-block">
                           <h5 class="text-2">Top Trending</h5>
                           <h1 class="text-1">HANDBAG</h1>
                           <p class="text-3">
                              Lorem ipsum dolor amet, consectetur adipisicing
                              <br>
                              elit. Vel similique perspiciatis, tempore unde
                           </p>
                           <a class="text-4 d-inline-block" href="#">Discover Now</a>
                        </div>
                     </div>
                     <div class="carousel-item" data-interval="3000">
                        <img src="https://cdn.shopify.com/s/files/1/0162/4018/1312/files/slider11.jpg?v=1547273112" class="carousel-img w-100 d-block" alt="slider">
                        <div class="carousel-caption d-none d-md-block">
                           <h5 class="text-2">New Arrivals</h5>
                           <h1 class="text-1">ZIP HOODIE</h1>
                           <p class="text-3">
                              Lorem ipsum dolor amet, consectetur adipisicing
                              <br>
                              elit. Vel similique perspiciatis, tempore unde
                           </p>
                           <a class="text-4 d-inline-block" href="#">Discover Now</a>
                        </div>
                     </div>
                     <div class="carousel-item" data-interval="3000">
                        <img src="https://cdn.shopify.com/s/files/1/0162/4018/1312/files/slider12.jpg?v=1547273190" class="carousel-img w-100 d-block" alt="slider">
                        <div class="carousel-caption d-none d-md-block">
                           <h5 class="text-2">Top Trending</h5>
                           <h1 class="text-1">CLOTHING</h1>
                           <p class="text-3">
                              Lorem ipsum dolor amet, consectetur adipisicing
                              <br>
                              elit. Vel similique perspiciatis, tempore unde
                           </p>
                           <a class="text-4 d-inline-block" href="#">Discover Now</a>
                        </div>
                     </div>
                  </div>
                  <!-- End carousel inner -->
                  <a href="#home-slide" class="carousel-control-prev" data-slide="prev">
                     <span class="carousel-control-prev-icon"></span>
                  </a>
                  <a href="#home-slide" class="carousel-control-next" data-slide="next">
                     <span class="carousel-control-next-icon"></span>
                  </a>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                     <div class="banner banner-sale banner-sneaker">
                        <a href="#" class="banner-sneaker d-block">
                           <img class="banner-sneaker-img d-block w-100" src="https://static.nike.com/a/images/t_prod/w_1920,c_limit,f_auto,q_auto/5da7ae68-e065-4308-a407-ef243f8373df/image.jpg" alt="banner-sneaker">
                        </a>
                        <div class="banner-content">
                           <h1>
                              Men’s Summer
                              <br>
                              Sneaker
                           </h1>
                           <h3>Big Sale Off This Week</h3>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <div class="banner banner-sale banner-clothing">
                        <a href="#" class="banner-clothing-link">
                           <img class="banner-clothing-img d-block w-100" src="https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/6d7a6b9e-da36-44d5-a7e4-80421b1cb274/life-unlined-chore-coat-zLhb1W.png" alt="banner-clothing">
                        </a>
                        <div class="banner-content">
                           <h1>Clothing No.18</h1>
                           <h3>Sale Off 20% All Store</h3>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <div class="banner banner-sale banner-bag">
                        <a href="#" class="banner-bag-link">
                           <img class="banner-bag-img d-block w-100" src="https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/d88b2de1-fddd-4848-9793-22f9489ef139/kyrie-backpack-kCq7LV.png" alt="banner-bag">
                        </a>
                        <div class="banner-content">
                           <h1>Bag No.18</h1>
                           <h3>Sale Off 20% All Store</h3>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="new_product">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="product-title text-center">
                  <h2>New Arrivals</h2>
                  <p>Contemporary, minimal and modern designs embody the Lavish Alice handwriting</p>
               </div>
            </div>
         </div>
         <div class="product-area owl-carousel owl-theme" id="owl">
            <?php
            for ($i = 0; $i < count($data['new_product']) - 1; $i++) {
            ?>
               <div class="item">
                  <div class="row">
                     <div class="col-12">
                        <div class="product_section">
                           <div class="section-img">
                              <a href="<?= _WEB_ROOT_PATH . '/product_detail/product/' . $data['new_product'][$i]['id'] ?>" class="product-img">
                                 <img src="<?php echo _IMG_PRODUCT_PATH . $data['new_product'][$i]['image'] ?>" alt="hinh1">
                              </a>
                              <div>
                                 <div class="product_add">
                                    <a href="#" class="add-link">
                                       <i class="fa-solid fa-cart-plus"></i>
                                    </a>
                                 </div>
                                 <div class="product_view">
                                    <a href="#" class="view-link">+ Quick View</a>
                                 </div>
                              </div>
                           </div>

                           <div class="product_content text-left">
                              <h3 class="product_name">
                                 <a href="<?= _WEB_ROOT_PATH . '/product_detail' ?>"><?php echo $data['new_product'][$i]['name']?></a>
                              </h3>
                              <div class="price-box">
                                 <span class="current-price"><?php echo format_money($data['new_product'][$i]['price']) ?></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-12">
                        <div class="product_section">
                           <div class="section-img">
                              <a href="<?= _WEB_ROOT_PATH . '/product_detail/product/' . $data['new_product'][++$i]['id'] ?>" class="product-img">
                                 <img src="<?php echo _IMG_PRODUCT_PATH . $data['new_product'][$i]['image'] ?>" alt="hinh2">
                              </a>
                              <div>
                                 <div class="product_add">
                                    <a href="#" class="add-link">
                                       <i class="fa-solid fa-cart-plus"></i>
                                    </a>
                                 </div>
                                 <div class="product_view">
                                    <a href="#" class="view-link">+ Quick View</a>
                                 </div>
                              </div>
                           </div>

                           <div class="product_content text-left">
                              <h3 class="product_name">
                                 <a href="<?= _WEB_ROOT_PATH . '/product_detail' ?>"><?php echo $data['new_product'][$i]['name']?></a>
                              </h3>
                              <div class="price-box">
                                 <span class="current-price"><?php echo format_money($data['new_product'][$i]['price']) ?></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            <?php
            }
            ?>

         </div>
      </div>
   </div>

   <div class="banner_thumb">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <a href="#" class="banner_thumb-link">
                  <img src="https://cdn.shopify.com/s/files/1/0162/4018/1312/files/banner21.jpg?v=1547965073" alt="woman_banner" class="img-banner img-fluid">
               </a>
            </div>
         </div>
      </div>
   </div>

   <div class="trend_product">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="product-title text-center">
                  <h2>Trending Product</h2>
                  <p>Contemporary, minimal and modern designs embody the Lavish Alice handwriting</p>
               </div>
            </div>
         </div>
         <div class="product-area owl-carousel owl-theme" id="owl">
            <div class="item">
               <div class="row">
                  <div class="col-12">

                     <div class="product_section">
                        <div class="section-img">
                           <a href="<?= _WEB_ROOT_PATH . '/product_detail' ?>" class="product-img">
                              <img src="https://cdn.shopify.com/s/files/1/0162/4018/1312/products/21_5b264d75-2d71-4121-8dd1-5269f5bc033a_large.jpg?v=1546406774" alt="hinh1">
                           </a>
                           <div>
                              <div class="product_add">
                                 <a href="#" class="add-link">
                                    <i class="fa-solid fa-cart-plus"></i>
                                 </a>
                              </div>
                              <div class="product_view">
                                 <a href="#" class="view-link">+ Quick View</a>
                              </div>
                              <div class="product_sale">
                                 <span class="percent-count">-18%</span>
                              </div>
                           </div>
                        </div>

                        <div class="product_content text-left">
                           <h3 class="product_name">
                              <a href="<?= _WEB_ROOT_PATH . '/product_detail' ?>">Nike Blazer Low</a>
                           </h3>
                           <div class="price-box">
                              <span class="current-price">300.000vnd</span>
                              <span class="old-price text-muted">500.000vnd</span>
                           </div>
                        </div>
                     </div>

                  </div>
               </div>
            </div>
            <div class="item">
               <div class="row">
                  <div class="col-12">
                     <div class="product_section">
                        <div class="section-img">
                           <a href="<?= _WEB_ROOT_PATH . '/product_detail' ?>" class="product-img">
                              <img src="https://cdn.shopify.com/s/files/1/0162/4018/1312/products/1_large.jpg?v=1546405215" alt="hinh2">
                           </a>
                           <div>
                              <div class="product_add">
                                 <a href="#" class="add-link">
                                    <i class="fa-solid fa-cart-plus"></i>
                                 </a>
                              </div>
                              <div class="product_view">
                                 <a href="#" class="view-link">+ Quick View</a>
                              </div>
                              <div class="product_sale">
                                 <span class="percent-count">-18%</span>
                              </div>
                           </div>
                        </div>

                        <div class="product_content text-left">
                           <h3 class="product_name">
                              <a href="<?= _WEB_ROOT_PATH . '/product_detail' ?>"> Nike Free Metcon</a>
                           </h3>
                           <div class="price-box">
                              <span class="current-price">300.000vnd</span>
                              <span class="old-price text-muted">500.000vnd</span>
                           </div>
                        </div>
                     </div>

                  </div>
               </div>
            </div>
            <div class="item">
               <div class="row">
                  <div class="col-12">
                     <div class="product_section">
                        <div class="section-img">
                           <a href="<?= _WEB_ROOT_PATH . '/product_detail' ?>" class="product-img">
                              <img src="https://cdn.shopify.com/s/files/1/0162/4018/1312/products/19_fbcc4c05-8e96-4fb9-a305-cca1416d469d_large.jpg?v=1546407706" alt="hinh1">
                           </a>
                           <div>
                              <div class="product_add">
                                 <a href="#" class="add-link">
                                    <i class="fa-solid fa-cart-plus"></i>
                                 </a>
                              </div>
                              <div class="product_view">
                                 <a href="#" class="view-link">+ Quick View</a>
                              </div>
                              <div class="product_sale">
                                 <span class="percent-count">-18%</span>
                              </div>
                           </div>
                        </div>

                        <div class="product_content text-left">
                           <h3 class="product_name">
                              <a href="<?= _WEB_ROOT_PATH . '/product_detail' ?>">Greg Lauren</a>
                           </h3>
                           <div class="price-box">
                              <span class="current-price">300.000vnd</span>
                              <span class="old-price text-muted">500.000vnd</span>
                           </div>
                        </div>

                     </div>

                  </div>
               </div>
            </div>
            <div class="item">
               <div class="row">
                  <div class="col-12">
                     <div class="product_section">
                        <div class="section-img">
                           <a href="<?= _WEB_ROOT_PATH . '/product_detail' ?>" class="product-img">
                              <img src="https://cdn.shopify.com/s/files/1/0162/4018/1312/products/13_f86a0e6e-7174-4f4d-b3f0-246eac02041b_large.jpg?v=1546406358" alt="hinh1">
                           </a>
                           <div>
                              <div class="product_add">
                                 <a href="#" class="add-link">
                                    <i class="fa-solid fa-cart-plus"></i>
                                 </a>
                              </div>
                              <div class="product_view">
                                 <a href="#" class="view-link">+ Quick View</a>
                              </div>
                              <div class="product_sale">
                                 <span class="percent-count">-18%</span>
                              </div>
                           </div>
                        </div>

                        <div class="product_content text-left">
                           <h3 class="product_name">
                              <a href="<?= _WEB_ROOT_PATH . '/product_detail' ?>">Long Sleeve</a>
                           </h3>
                           <div class="price-box">
                              <span class="current-price">300.000vnd</span>
                              <span class="old-price text-muted">500.000vnd</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="item">
               <div class="row">
                  <div class="col-12">
                     <div class="product_section">
                        <div class="section-img">
                           <a href="<?= _WEB_ROOT_PATH . '/product_detail' ?>" class="product-img">
                              <img src="https://cdn.shopify.com/s/files/1/0162/4018/1312/products/9_68603096-502f-4896-9da6-1dab31605dd9_large.jpg?v=1646301657" alt="hinh1">
                           </a>
                           <div>
                              <div class="product_add">
                                 <a href="#" class="add-link">
                                    <i class="fa-solid fa-cart-plus"></i>
                                 </a>
                              </div>
                              <div class="product_view">
                                 <a href="#" class="view-link">+ Quick View</a>
                              </div>
                              <div class="product_sale">
                                 <span class="percent-count">-18%</span>
                              </div>
                           </div>
                        </div>

                        <div class="product_content text-left">
                           <h3 class="product_name">
                              <a href="<?= _WEB_ROOT_PATH . '/product_detail' ?>">Marathon Adizero</a>
                           </h3>
                           <div class="price-box">
                              <span class="current-price">300.000vnd</span>
                              <span class="old-price text-muted">500.000vnd</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="item">
               <div class="row">
                  <div class="col-12">
                     <div class="product_section">
                        <div class="section-img">
                           <a href="<?= _WEB_ROOT_PATH . '/product_detail' ?>" class="product-img">
                              <img src="https://cdn.shopify.com/s/files/1/0162/4018/1312/products/18_a118ddc5-55b0-4859-9e38-426c1d5cc8e7_large.jpg?v=1546407655" alt="hinh1">

                           </a>
                           <div>
                              <div class="product_add">
                                 <a href="#" class="add-link">
                                    <i class="fa-solid fa-cart-plus"></i>
                                 </a>
                              </div>
                              <div class="product_view">
                                 <a href="#" class="view-link">+ Quick View</a>
                              </div>
                              <div class="product_sale">
                                 <span class="percent-count">-18%</span>
                              </div>
                           </div>
                        </div>

                        <div class="product_content text-left">
                           <h3 class="product_name">
                              <a href="<?= _WEB_ROOT_PATH . '/product_detail' ?>">Black Hoodie Unisex</a>
                           </h3>
                           <div class="price-box">
                              <span class="current-price">300.000vnd</span>
                              <span class="old-price text-muted">500.000vnd</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</main>