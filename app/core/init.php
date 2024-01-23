<?php
// a file to load the other files inside the core folder

spl_autoload_register(function($classname){ // load whatever class that we can find
    require "../app/models/".ucfirst($classname).".php";
}); 
require 'config.php';
require 'functions.php';
require 'Database.php';
require 'Model.php';
require 'Controller.php';
require 'App.php';