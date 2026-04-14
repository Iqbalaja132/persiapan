<?php

class koneksi {
    private $server = "localhost";
    private $usn = "root";
    private $pw = "";
    private $db = "db_tiket_praukk";

    public $koneksi;

    function __construct() {
        $this->koneksi = mysqli_connect(
            $this->server, $this->usn, $this->pw, $this->db
        );
    }
}