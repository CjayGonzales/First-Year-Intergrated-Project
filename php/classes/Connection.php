<?php
class Connection
{
    private static $instance = null;

    public static function getInstance()
    {
        $host = "localhost";
        $database = "goingviral_db";
        $username = "root";
        $password = "";

        $dsn = "mysql:dbname=" . $database . ";host=" . $host;

        if (self::$instance === null) {
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            self::$instance = $pdo;
        }

        return self::$instance;
    }
}
