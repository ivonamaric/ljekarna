<?php
class DbConnection
{
    public function __construct()
    {
    }

    public function connection()
    {
        $mysqli = new mysqli("localhost", "root", "", "stanje");
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }
        echo "Connected to database.";
        return $mysqli;
    }
}

$db = new DbConnection();
$db->connection();
