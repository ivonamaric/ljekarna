<?php
class DbConnection
{
    public function __construct()
    {
    }

    public function connection()
    {
        $conn = mysqli_connect("localhost", "root", "", "stanje");

        if (mysqli_connect_errno()) {
            die("Couldn't connect to database");
        }
        echo "Connected to database.";
        return $conn;
    }
}

$db = new DbConnection();
$db->connection();
