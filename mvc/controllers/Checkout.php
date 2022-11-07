<?php
class Checkout extends Controller{

    function __construct()
    {
        $this->bills = $this->model('BillModel');
    }
    function index(){
        // show_array($_SESSION['user']['name']);
        // show_array(getInfoUser('name'));
		if(isset($_SESSION['cart'])){
			return $this->view("client", [
            'page' => 'checkout',
            'title' => 'Your Checkout',
            'css' => ['base', 'main','responsive'],
            'js' => ['main', 'ajax', 'jquery.validate', 'form_validate']
        ]);
		}else{
			redirectTo();
		}
        
    }
    
    
}