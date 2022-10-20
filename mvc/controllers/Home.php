<?php
class Home extends Controller{

    function index(){
        
        $this->view("client", [
            'title' => 'Trang chu',
            'page' => 'home',
            'css' => ['base', 'main','responsive'],
            'js' => 'main'
        ]);
    }

    
}
?>