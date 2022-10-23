<?php
class Home extends Controller{

    private $product;
    public function __construct() {
        $this->product = $this->model('ProductModel');
    }
    function index(){
        $new_product = $this->product->getNewArrivals();
        
        // show_array($new_product);
        $this->view("client", [
            'title' => 'Trang chủ',
            'page' => 'home',
            'new_product' => $new_product,
            'css' => ['base', 'main','responsive'],
            'js' => ['main']
        ]);
    }

    
}
?>