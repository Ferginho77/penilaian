<?php 

include_once 'conn.php';

class C_nilai {
    public function TampilNilai($IdKategori){
        $conn = new database();
        
        $query = "SELECT penilaian.*, juri.Username, peserta.nama_anjing 
                  FROM penilaian 
                  INNER JOIN juri ON penilaian.IdJuri = juri.IdJuri 
                  INNER JOIN peserta ON penilaian.no_peserta = peserta.no_peserta
                  WHERE penilaian.IdKategori = $IdKategori";
        $data = mysqli_query($conn->koneksi, $query);
        
        $hasil = [];
        while ($d = mysqli_fetch_object($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }
    
    public function TambahNilai($status, $waktu_tempuh, $fault, $refusal, $result, $IdKategori, $no_peserta, $IdJuri) {
        $conn = new database();
        
        // Tambahkan koma setelah '$no_peserta'
        $sql = "INSERT INTO penilaian VALUES (NULL, '$status', '$waktu_tempuh', '$fault', '$refusal', '$result', '$IdKategori', '$no_peserta', $IdJuri)";
        
        $queryResult = mysqli_query($conn->koneksi, $sql);
        
        
    }
    
}