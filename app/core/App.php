<?php
class App{

    private $controller = 'home'; // default controller to prevent mistype
    private $method = 'index'; // default method to prevent mistype
    private function split_url(){
        $URL = $_GET['url'] ?? 'home'; // when the user type something error it will go directly to the home page
        $URL = explode("/", trim($URL,'/')); // Seperate the string based on the delimiter we set on the first delimiter
        return $URL;
    }
    
    public function loadController(){
        $URL = $this->split_url();
        /** SELECT CONTROLLER **/
        $filename = "../app/controllers/".ucfirst($URL[0]).".php"; // ucfirst, convert the first character into uppercase
        // if that file exist require it
        if(file_exists($filename)){ 
            require $filename;
            $this->controller = ucfirst(($URL[0]));
        }else{
            $filename = "../app/controllers/_404.php";
            require $filename; 
            $this->controller = "_404";
        }
        $controller = new $this->controller;
        /** SELECT METHOD **/
        if(!empty($URL[1])){
            if(method_exists($controller, $URL[1])){
                $this->method = $URL[1];
            }
        }
        call_user_func_array([$controller, $this->method], $URL); 
    }     
}

