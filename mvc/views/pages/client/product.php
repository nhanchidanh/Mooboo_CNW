<?php
$index = strpos($_SERVER['QUERY_STRING'], '&');
$QUERY_STRING = substr($_SERVER['QUERY_STRING'], $index+1);
$QUERY_STRING = explode('&', $QUERY_STRING);
// show_array($QUERY_STRING);
$QUERY_STRING_NEW = [];

foreach ($QUERY_STRING as $item) {
   $array_new = explode('=', $item);
   $QUERY_STRING_NEW[$array_new[0]] = $array_new[1];
}
$QUERY_STRING = '';
$QUERY_STRING_CATE = '';
$QUERY_STRING_MIN_MAX = '';
foreach ($QUERY_STRING_NEW as $key => $value) {
   if($key != 'cate' && $key != 'rl'){
      $QUERY_STRING_CATE .= '&' . $key . '=' . $value;
   }
   if($key != 'min' && $key != 'max' && $key != 'rl'){
      $QUERY_STRING_MIN_MAX .= '&' . $key . '=' . $value;
   }
   $QUERY_STRING .= '&' . $key . '=' . $value;
}
$QUERY_STRING = trim($QUERY_STRING, '&');
$QUERY_STRING_CATE = trim($QUERY_STRING_CATE, '&');
$QUERY_STRING_MIN_MAX = trim($QUERY_STRING_MIN_MAX, '&');
// show_array($QUERY_STRING);



?>
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
                           <a class="dropdown-item <?php if (isset($_GET['cate']) && $_GET['cate'] == $category['id_cate']) echo "active" ?>" href="?cate=<?= $category['id_cate'] ?><?= '&' . $QUERY_STRING_CATE ?>"><?= $category['name'] ?></a>
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
                        <a class="dropdown-item" href="<?= _WEB_ROOT_PATH . '/Product/show_product&' . $QUERY_STRING_MIN_MAX ?>">All</a>
                        <a class="dropdown-item" href="<?= _WEB_ROOT_PATH . '/Product/show_product?min=0&max=1000000&' . $QUERY_STRING_MIN_MAX ?>">Under 1 Milion</a>
                        <a class="dropdown-item" href="<?= _WEB_ROOT_PATH . '/Product/show_product?min=1000000&max=2000000&' . $QUERY_STRING_MIN_MAX ?>">1tr to 2tr</a>
                        <a class="dropdown-item" href="<?= _WEB_ROOT_PATH . '/Product/show_product?min=2000000&max=20000000&' . $QUERY_STRING_MIN_MAX?>">up to 2Milion</a>
                     </div>
                  </div>
               </div>

               <div class="row shop_wrapper product-area">
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
                                       <span data-path="<?= _IMG_PRODUCT_PATH ?>" data-id="<?= $product['id'] ?>" data-url="<?= _WEB_ROOT_PATH . '/ajax' ?>" class="add-link">
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

               <?php
               if (!empty($data['products'])) {
               ?>
                  <nav class="mt-5">
                     <ul class="pagination pagination-lg justify-content-center">
                        <li class="page-item <?= ($data['current_page'] - 1 == 0) ? 'disabled' : '' ?>">
                           <a class="page-link" href="<?= _WEB_ROOT_PATH . '/product/show_product?page=' . $data['current_page'] - 1 ?><?= '&' . $QUERY_STRING ?>" tabindex="-1">Previous</a>
                        </li>
                        <?php
                        for ($i = 1; $i <= $data['total_page']; $i++) {
                        ?>
                           <li class="page-item <?= ($data['current_page'] == $i) ? 'active' : '' ?>">
                              <a class="page-link" href="<?= _WEB_ROOT_PATH . '/product/show_product?page=' . $i ?><?='&' . $QUERY_STRING?>"><?= $i ?></a>
                           </li>
                        <?php
                        }
                        ?>
                        <li class="page-item <?= ($data['current_page'] + 1 > $data['total_page']) ? 'disabled' : '' ?>">
                           <a class="page-link" href="<?= _WEB_ROOT_PATH . '/product/show_product?page=' . $data['current_page'] + 1 ?><?= '&' . $QUERY_STRING?>">Next</a>
                        </li>
                     </ul>
                  </nav>

               <?php
               }

               ?>
            </div>
         </div>
      </div>
   </div>

</main>