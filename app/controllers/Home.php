<?php

class Home extends Controller{
    public function index(){
        $this->view('home');
    }
    
    public function faceRecognition(){
        $this->view(('facerecognition'));
    }
}
 