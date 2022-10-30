<main class="wp-content">
   <div class="breadcrumb_content">
      <div class="container">
         <div class="row">
            <div class="col-12">
               <nav>
                  <ol class="breadcrumb-list breadcrumb">
                     <li class="breadcrumb-item"><a href="<?= _WEB_ROOT_PATH ?>">Home</a></li>
                     <li class="breadcrumb-item <?= $_GET['cate'] ?? "active" ?>" aria-current="page"><a href="<?= _WEB_ROOT_PATH . '/product/show_product' ?>">Products</a></li>
                     <?php
                     if (isset($_GET['cate'])) {
                     ?>
                        <li class="breadcrumb-item active" aria-current="page"><?= getNameCate($_GET['cate'])['name'] ?></li>
                     <?php
                     } else {
                        echo "";
                     }
                     ?>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </div>

   <div class="shop_area">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="shop_title">
                  <h1>Shop</h1>
               </div>
               <div class="shop_toolbar_wrapper">
                  <div class="dropdown">
                     <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                        <?php
                        if (isset($_GET['cate'])) {
                           echo getNameCate($_GET['cate'])['name'];
                        } else {
                           echo "Category";
                        }
                        ?>
                     </button>
                     <div class="dropdown-menu">
                        <?php
                        foreach ($data['categories'] as  $category) {
                        ?>
                           <a class="dropdown-item <?php if (isset($_GET['cate']) && $_GET['cate'] == $category['id_cate']) echo "active" ?>" href="?cate=<?= $category['id_cate'] ?>"><?= $category['name'] ?></a>
                        <?php
                        }
                        ?>
                     </div>
                  </div>

                  <div class="dropdown">
                     <button class="btn dropdown-toggle" type="button" data-display="static" data-toggle="dropdown" aria-expanded="false">
                        Price level
                     </button>
                     <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Under 1tr</a>
                        <a class="dropdown-item" href="#">1tr to 2tr</a>
                        <a class="dropdown-item" href="#">up to 2tr</a>
                     </div>
                  </div>
               </div>

               <div class="row shop_wrapper">
                  <?php
                  if (!empty($data['products'])) {
                     foreach ($data['products'] as $product) {
                  ?>
                        <div class="col-lg-3 col-sm-6 col-12 col-md-4">
                           <div class="product_section">
                              <div class="section-img">
                                 <a href="<?= _WEB_ROOT_PATH . '/product_detail/product/' . $product['id'] ?>" class="product-img">
                                    <img src="<?= _IMG_PRODUCT_PATH . $product['image'] ?>" alt="hinh1">

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
                                    <a href="product-detail.html"><?= $product['name'] ?></a>
                                 </h3>
                                 <div class="price-box">
                                    <span class="current-price"><?= format_money($product['price']) ?></span>
                                 </div>
                              </div>
                           </div>
                        </div>
                  <?php
                     }
                  } else {
                     echo '<div class="text-center w-100 p-5"><h2>Not found product!</h2></div>';
                  }
                  ?>

               </div>


               <nav class="mt-5" aria-label="Page navigation example">
                  <ul class="pagination pagination-lg justify-content-center">
                     <li class="page-item <?= ($data['current_page']-1 == 0) ? 'disabled' : '' ?>">
                        <a class="page-link" href="<?= _WEB_ROOT_PATH . '/product/show_product?page=' . $data['current_page']-1 ?><?= (!empty($data['keyword'])) ? "&search=${data['keyword']}" : '' ?>" tabindex="-1">Previous</a>
                     </li>
                     <?php
                     for ($i=1; $i <= $data['total_page']; $i++) {
                        ?>
                        <li class="page-item <?= ($data['current_page'] == $i) ? 'active' : '' ?>">
                           <a class="page-link" href="<?= _WEB_ROOT_PATH . '/product/show_product?page=' . $i?><?= (!empty($data['keyword'])) ? "&search=${data['keyword']}" : '' ?>"><?= $i?></a>
                        </li>
                        <?php
                     }
                     ?>
                     <li class="page-item <?= ($data['current_page']+1 > $data['total_page']) ? 'disabled' : '' ?>">
                        <a class="page-link" href="<?= _WEB_ROOT_PATH . '/product/show_product?page=' . $data['current_page']+1 ?><?= (!empty($data['keyword'])) ? "&search=${data['keyword']}" : '' ?>">Next</a>
                     </li>
                  </ul>
               </nav>
            </div>
         </div>
      </div>
   </div>

</main>