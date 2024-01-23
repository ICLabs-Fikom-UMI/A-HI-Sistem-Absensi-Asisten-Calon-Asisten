<?php

require "../app/core/init.php";
session_start();

function show($stuff){
    echo "<pre>";
    print_r($stuff);
    echo "</pre>";
}


$app = new App;
$app->loadController();
