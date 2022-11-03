<?php
class Contact extends Controller{
    
    function index(){
        return $this->view("client", [
            'page' => 'contact',
            'title' => 'Contact',
            'css' => ['base', 'main','responsive', 'contact'],
            'js' => ['main','ajax']
        ]);
    }
}