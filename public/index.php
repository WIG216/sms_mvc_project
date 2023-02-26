<?php

session_start();
require '../app/core/init.php'; // loading all the classes

DEBUG? ini_set('display_errors', 1):ini_set('display_errors',0);
$app = new App;  // instantiating the app class

$app -> loadController();