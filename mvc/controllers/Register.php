<?php
class Register extends controller {
    public function index(){
        $this->view("client", [
            'title' => 'Đăng nhập',
            'page' => 'register',
            'css' => ['base', 'main','responsive', 'account'],
            'js' => 'main'
        ]);
    }
}