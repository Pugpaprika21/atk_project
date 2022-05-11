<?php

namespace App\DataBase;

use PDO;
use PDOException;

class DB
{
    //
    private static $server = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $dbname = "db_covid19";
    /**
     * Undocumented function
     *
     * @return void
     */
    public static function connect($set = null): PDO
    {
        $server = self::$server;
        $username = self::$username;
        $password = self::$password;
        $dbname = self::$dbname;
        //
        try {
            $conn = new PDO("mysql:host={$server};dbname={$dbname}", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
