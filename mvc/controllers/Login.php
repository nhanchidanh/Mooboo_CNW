<?php
class Login extends controller {
    public function index(){
        $this->view("client", [
            'title' => 'Đăng nhập',
            'page' => 'login',
            'css' => ['base', 'main','responsive', 'account'],
            'js' => ['main', 'jquery.validate', 'form_validate']
        ]);
    }
}