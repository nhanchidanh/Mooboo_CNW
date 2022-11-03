<?php
class About extends Controller{
    
    function index(){
        return $this->view("client", [
            'page' => 'about',
            'title' => 'About',
            'css' => ['base', 'main','responsive', 'about'],
            'js' => ['main','ajax']
        ]);
    }
}