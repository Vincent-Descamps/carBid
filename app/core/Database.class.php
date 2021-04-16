<?php


namespace App\Database;

use PDO;

abstract class Database
{
    const ADDRESS = "mysql:dbname=enchere;host:8889";
    const USER = "root";
    const PASSWORD = "root";

    public static function createDBConnection()
    {
        return new PDO(self::ADDRESS, self::USER, self::PASSWORD);
    }
}
