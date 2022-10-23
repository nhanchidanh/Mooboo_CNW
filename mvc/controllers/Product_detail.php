<?php
class Product_detail extends Controller{
    function __construct()
    {
        $this->products = $this->model('ProductModel');
        $this->categories = $this->model('CategoryModel');
    }
    function product($id)
    {
        $product = $this->products->SelectProduct($id);
        $image_product = $this->products->SelectProductImg($id);
        // show_array($product['cate_id']);
        return $this->view("client",[
            'page' => 'product_detail',
            'css' => ['base', 'main','responsive', 'product_detail'],
            'product' => $product,
            'image_product' => $image_product,
            'js' => ['main'],
            'title' => 'detail'
        ]);
    }
}