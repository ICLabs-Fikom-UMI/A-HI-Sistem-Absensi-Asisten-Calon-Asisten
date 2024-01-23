<?php

class Home extends Controller{
    public function index($a = '', $b = '', $c = ''){
        $kehadiran = new Kehadiran;
        show("this is INDEX function");
        $this->view('home');
    }

    public function edit($a='', $b='', $c=''){
        show("this is EDIT function");
    }

    
}
 