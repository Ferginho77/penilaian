<?php
session_start();

class database {
    private $host = "localhost";
    private $uname = "root";
    private $pass = "";
    private $db = "perkin";
    public $koneksi;

    function __construct() {
        // Mencoba untuk membuat koneksi
        $this->koneksi = mysqli_connect($this->host, $this->uname, $this->pass, $this->db);

        // Memeriksa apakah koneksi berhasil
        if (!$this->koneksi) {
            die("Koneksi database mysql dan php GAGAL: " . mysqli_connect_error());
        }
    }

    // Menambahkan fungsi untuk menutup koneksi
    function __destruct() {
        mysqli_close($this->koneksi);
    }
}

// Membuat instance dari kelas database
$conn = new database();
