<?php
class Home extends Controller{

    private $product;
    public function __construct() {
        $this->product = $this->model('ProductModel');
    }
    function index(){
        $new_product = $this->product->getNewArrivals();
        $trend_products = $this->product->getTrendPro();
        // show_array($trend_product);
        $this->view("client", [
            'title' => 'Home',
            'page' => 'home',
            'new_product' => $new_product,
            'trend_products' => $trend_products,
            'css' => ['base', 'main','responsive'],
            'js' => ['main']
        ]);
    }

    
}
?>