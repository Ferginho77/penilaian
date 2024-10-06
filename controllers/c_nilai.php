<?php 

include_once 'conn.php';

class C_nilai {
    public function TampilNilai($id){
        $conn = new database();
        
        $query = "SELECT * FROM penilaian WHERE IdKategori = $id";
        $data = mysqli_query($conn->koneksi, $query);
        
        $hasil = [];
        while ($d = mysqli_fetch_object($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }

    public function TambahNilai($timestamp, $status, $waktu_tempuh, $fault, $refusal, $result, $no_peserta, $IdKategori) {
        $conn = new database();
        $sql = "INSERT INTO penilaian VALUES (NULL, '$timestamp', '$status', '$waktu_tempuh', '$fault', '$refusal', '$result', '$refusal', '$no_peserta' '$IdKategori')";
           
        $result = mysqli_query($conn->koneksi, $sql);
        var_dump($result);
        exit;
        if ($result) {
            header("Location: ../views/devent.php");
        } else {
            echo "<script>alert('Data Gagal Ditambah');window.location='../views/devent.php'</script>";
        }
    }
}