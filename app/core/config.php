<?php
    if($_SERVER['SERVER_NAME'] == 'localhost')
    {
        // database config
        define('DBNAME', 'sms_mvc_project');
        define('DBHOST', 'localhost');
        define('USERNAME', 'root');
        define('PASSWORD', '');

        define('ROOT', 'http://localhost/sms_mvc_project/public/');
    }

    define("APP_NAME", "MVC PROJECT");

    // true means it shows errors
    define('DEBUG', true);