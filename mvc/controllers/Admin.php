<?php
class Admin extends Controller{

    public function __construct()
    {
        $this->user = $this->model('UserModel');
    }

    public function index(){
        $users = $this->user->getAll('', 0, 0);
        
        return $this->view("admin",[
            'page' => 'dashboard',
            'users' => $users
        ]);
    }

    
}