<?php

require "../app/core/init.php";
session_start();

function show($stuff){
     print_r($stuff);
}


$app = new App;
$app->loadController();
