<?php

require "../app/core/init.php";
session_start();

$app = new App;
$app->loadController();
