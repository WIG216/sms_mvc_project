<?php

// all the files in the core folder will be loaded here for better code structure
// the core folder holds all the information that must be loaded for the proper functioning of the app

// auto load classes
spl_autoload_register(function($classname){
    require $filename = "../app/models/".ucfirst($classname).".php";
});

require 'config.php';
require 'Database.php';
require 'Controller.php';
require 'Model.php';
require 'functions.php';
require 'App.php';