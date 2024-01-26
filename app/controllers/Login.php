<?php

class Login extends Controller{
    public function index(){
        show($_POST);
        $this->view('login');
        
    }

    public function login(){
        // $username = $_POST['username'];
        // $password = $_POST['password'];
        show($_POST);
        
    }
}