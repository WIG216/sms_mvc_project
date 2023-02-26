<?php

/** 
 * Admin Class
 */

class Admin
{
    use Model;
    protected $table = 'admin';

    protected $allowedColumns = [
        'name'
    ];
}
