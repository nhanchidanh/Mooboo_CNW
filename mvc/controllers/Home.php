<?php
class Home extends Controller{

    function index(){
        $danh = $this->model("SinhVienModel");

        $this->view("client", [
            'title' => 'Trang chủ',
            'page' => 'home',
            'css' => ['base', 'main','responsive'],
            'js' => ['main']
        ]);
    }

    
}
?>