<?php
class Register extends controller {
    public function index(){
        $this->view("client", [
            'title' => 'Đăng ký',
            'page' => 'register',
            'css' => ['base', 'main','responsive', 'account'],
            'js' => ['main', 'jquery.validate', 'form_validate']
        ]);
    }
}