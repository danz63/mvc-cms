<?php
class Database
{
    public $conn;
    public function __construct()
    {
        $this->conn = mysqli_connect(HOST, USER, PASS, DBNAME);
        if (mysqli_connect_errno()) {
            die("Failed to connect to MySQL : " . mysqli_connect_error());
        }
    }

    public function query($query = '', $return = '')
    {
        $execQuery = mysqli_query($this->conn, $query);
        if (!$execQuery) {
            die("Error description: " . mysqli_error($this->conn));
        }
        if ($return == 'get') {
            $data = [];
            while ($row = mysqli_fetch_assoc($execQuery)) {
                $data[] = $row;
            }
        } else {
            $data = mysqli_affected_rows($this->conn);
        }
        return $data;
    }
}
