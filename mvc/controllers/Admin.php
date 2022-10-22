<?php
class Admin extends Controller{
    public function index(){

        return $this->view("admin",[
            'page' => 'dashboard'
            
        ]);
    }

    
}