<?php
class Cart extends Controller{
    
    function index(){
        return $this->view("client", [
            'page' => 'cart',
            'title' => 'Your Cart',
            'css' => ['base', 'main','responsive'],
            'js' => ['main','ajax']
        ]);
    }
}