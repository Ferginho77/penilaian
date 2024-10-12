<?php 

include_once 'conn.php';

class C_kategori {
    public function Tambahkategori($NamaEvent, $Deskripsi){
        $conn = new database();
        $sql = "INSERT INTO kategori VALUES (NULL, '$NamaEvent', '$Deskripsi')";
            
        $result = mysqli_query($conn->koneksi, $sql);
        if ($result) {
            header("Location: ../views/kategori.php");
        } else {
            echo "<script>alert('Data Gagal Ditambah');window.location='../views/kategori.php'</script>";
        }
    }

    public function tampil_data() {
        $conn = new database();
        $data = mysqli_query($conn->koneksi, "SELECT * FROM kategori ORDER BY IdKategori desc ");
        $hasil = [];
        while ($d = mysqli_fetch_object($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }

    public function hapus($IdKategori) {
        $conn = new database();
        $sql = "DELETE FROM kategori WHERE IdKategori = $IdKategori";
        $result = mysqli_query($conn->koneksi, $sql);
        return $result;
    }

    public function tampil_devent($id) {
        $conn = new database();
        $data = mysqli_query($conn->koneksi, "SELECT * FROM kategori WHERE IdKategori = $id ");
        $hasil = [];
        while ($d = mysqli_fetch_object($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }

    // Fungsi untuk menghitung total kategori
    public function hitung_kategori() {
        $conn = new database();
        $data = mysqli_query($conn->koneksi, "SELECT COUNT(*) as total FROM kategori");
        $hasil = mysqli_fetch_object($data);
        return $hasil->total;
    }
}
