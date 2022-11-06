<main class="wp-content">
   <div class="slider-banner">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-8" >
               <div id="home-slide" class="slider carousel slide carousel-fade" data-ride="carousel" data-aos="fade-right">
                  <ol class="carousel-indicators">
                     <li data-target="#home-slide" data-slide-to="0" class="active"></li>
                     <li data-target="#home-slide" data-slide-to="1"></li>
                     <li data-target="#home-slide" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                     <div class="carousel-item active" data-interval="3000">
                        <img src="<?= _PUBLIC_PATH . '/client/assets/img/slider_1.png' ?>" class="carousel-img w-100 d-block" alt="slider">
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
                        <img src="<?= _PUBLIC_PATH . '/client/assets/img/slider_2.png'?>" class="carousel-img w-100 d-block" alt="slider">
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
                        <img src="<?= _PUBLIC_PATH . '/client/assets/img/slider_3.png'?>" class="carousel-img w-100 d-block" alt="slider">
                        <div class="carousel-caption d-none d-md-block">
                           <h5 class="text-2">Top Trending</h5>
                           <h1 class="text-1">SNEAKER</h1>
                           <p class="text-3">
                              From tough stitching, to pristine leather, to the cupsole
                              <br>
                              design, it delivers durable style that's smoother than backboard.
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
                  <div class="col-12">
                     <div class="banner banner-sale banner-sneaker" data-aos="fade-left">
                        <a href="#" class="banner-sneaker d-block">
                           <img class="banner-sneaker-img d-block w-100" src="<?= _PUBLIC_PATH . '/client/assets/img/men_summer.png'?>" alt="banner-sneaker">
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
                  <div class="col-6" data-aos="fade-up">
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
                  <div class="col-6" data-aos="fade-up">
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

   <div class="new_product" >
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="product-title text-center">
                  <h2>New Arrivals</h2>
                  <p>Contemporary, minimal and modern designs embody the Lavish Alice handwriting</p>
               </div>
            </div>
         </div>
         <div class="wp-new-arrivals">
            <div class="product-area owl-carousel owl-theme" id="owl">
            <?php
            for ($i = 0; $i < count($data['new_product']) - 1; $i++) {
            ?>
               <div class="item">
                  <div class="row">
                     <div class="col-12">
                        <div class="product_section" data-aos="fade-up">
                           <div class="section-img">
                              <a href="<?= _WEB_ROOT_PATH . '/product_detail/product/' . $data['new_product'][$i]['id'] ?>" class="product-img">
                                 <img src="<?php echo _IMG_PRODUCT_PATH . $data['new_product'][$i]['image'] ?>" alt="hinh1">
                              </a>
                              <div>
                                 <div class="product_add">
                                    <span data-path="<?= _IMG_PRODUCT_PATH ?>" data-id="<?= $data['new_product'][$i]['id'] ?>" data-url="<?= _WEB_ROOT_PATH . '/ajax' ?>" class="add-link">
                                       <i class="fa-solid fa-cart-plus"></i>
                                    </span>
                                 </div>
                                 <div class="product_view">
                                    <a href="#" class="view-link">+ Quick View</a>
                                 </div>
                              </div>
                           </div>

                           <div class="product_content text-left">
                              <h3 class="product_name">
                                 <a href="<?= _WEB_ROOT_PATH . '/product_detail' ?>"><?php echo $data['new_product'][$i]['name'] ?></a>
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
                        <div class="product_section" data-aos="fade-up">
                           <div class="section-img">
                              <a href="<?= _WEB_ROOT_PATH . '/product_detail/product/' . $data['new_product'][++$i]['id'] ?>" class="product-img">
                                 <img src="<?php echo _IMG_PRODUCT_PATH . $data['new_product'][$i]['image'] ?>" alt="hinh2">
                              </a>
                              <div>
                                 <div class="product_add">
                                    <span data-path="<?= _IMG_PRODUCT_PATH ?>" data-id="<?= $data['new_product'][$i]['id'] ?>" data-url="<?= _WEB_ROOT_PATH . '/ajax' ?>" class="add-link">
                                       <i class="fa-solid fa-cart-plus"></i>
                                    </span>
                                 </div>
                                 <div class="product_view">
                                    <a href="#" class="view-link">+ Quick View</a>
                                 </div>
                              </div>
                           </div>

                           <div class="product_content text-left">
                              <h3 class="product_name">
                                 <a href="<?= _WEB_ROOT_PATH . '/product_detail' ?>"><?php echo $data['new_product'][$i]['name'] ?></a>
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
   </div>

   <div class="banner_thumb" data-aos="fade-up">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <a href="#" class="banner_thumb-link">
                  <img src="<?= _PUBLIC_PATH . '/client/assets/img/thumb_summer.png'?>" alt="summer_banner" class="img-banner img-fluid">
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
         <div class="product-area owl-carousel owl-theme" id="owl" data-aos="fade-up">
            <?php
            foreach ($data['trend_products'] as  $trend_product) {
            ?>
               <div class="item">
                  <div class="row">
                     <div class="col-12">
                        <div class="product_section">
                           <div class="section-img">
                              <a href="<?= _WEB_ROOT_PATH . '/product_detail/product/' . $trend_product['id'] ?>" class="product-img">
                                 <img src="<?= _IMG_PRODUCT_PATH . $trend_product['image'] ?>" alt="hinh1">
                              </a>
                              <div>
                                 <div class="product_add">
                                    <span data-path="<?= _IMG_PRODUCT_PATH ?>" data-id="<?= $trend_product['id'] ?>" data-url="<?= _WEB_ROOT_PATH . '/ajax' ?>" class="add-link">
                                       <i class="fa-solid fa-cart-plus"></i>
                                    </span>
                                 </div>
                                 <div class="product_view">
                                    <a href="#" class="view-link">+ Quick View</a>
                                 </div>
                              </div>
                           </div>
                           <div class="product_content text-left">
                              <h3 class="product_name">
                                 <a href="<?= _WEB_ROOT_PATH . '/product_detail' ?>"><?= $trend_product['name']?></a>
                              </h3>
                              <div class="price-box">
                                 <span class="current-price"><?= format_money($trend_product['price'])?></span>
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
</main>