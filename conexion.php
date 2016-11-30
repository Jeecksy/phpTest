<?php

class Conexion {

    public $conn;

    function __construct() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "phptest";
        $this->conn = new mysqli($servername, $username, $password, $dbname);
    }

    public function getConn() {
        return $this->conn;
    }

    public function stringEscape($escape) {
        $coded = mysqli_real_escape_string($this->conn, $escape);
        return $coded;
    }

    public function encrypt($aEncriptar) {
        $passHash = password_hash($aEncriptar, PASSWORD_BCRYPT);
        return $passHash;
    }

    public function verify($password, $hash) {
        return password_verify($password, $hash);
    }

}
