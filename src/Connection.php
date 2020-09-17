<?php
namespace App;

use \PDO;

class Connection {


    public static function getPDO (): PDO 
    {
        return new PDO('mysql:dbname=phpblog;host=127.0.0.1:8889', 'root', 'root', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

}