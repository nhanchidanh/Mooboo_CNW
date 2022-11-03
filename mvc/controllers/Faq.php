<?php
class Faq extends Controller{
    
    function index(){
        return $this->view("client", [
            'page' => 'faq',
            'title' => 'FAQ',
            'css' => ['base', 'main','responsive', 'faq'],
            'js' => ['main','ajax']
        ]);
    }
}