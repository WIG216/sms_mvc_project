<?php

session_start();
require '../app/core/init.php'; // loading all the classes

$app = new App;  // instantiating the app class

$app -> loadController();