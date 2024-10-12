<?php 

include_once 'conn.php';

class C_nilai {
  public function Tampilresult($filters) {
    $conn = new database();
    
    if (empty($filters['IdKategori'])) {
        return []; 
    }

    $IdKategori = intval($filters['IdKategori']);
    $query = "SELECT penilaian.*, juri.Username, peserta.nama_anjing, peserta.handler, 
                     peserta.nama_pemilik, peserta.size
              FROM penilaian 
              INNER JOIN juri ON penilaian.IdJuri = juri.IdJuri 
              INNER JOIN peserta ON penilaian.no_peserta = peserta.no_peserta
              WHERE penilaian.IdKategori = $IdKategori";

    if (!empty($filters['status'])) {
        $status = mysqli_real_escape_string($conn->koneksi, $filters['status']);
        $query .= " AND peserta.size = '$status'";
    }
    
    if (!empty($filters['kelas'])) {
        $kelas = mysqli_real_escape_string($conn->koneksi, $filters['kelas']);
        $query .= " AND penilaian.kelas = '$kelas'";
    }
    
   if (!empty($filters['juri'])) {
    $juri = mysqli_real_escape_string($conn->koneksi, $filters['juri']);
    $query .= " AND juri.Username = '$juri'";
}

    if (!empty($filters['tanggal'])) {
        $tanggal = mysqli_real_escape_string($conn->koneksi, $filters['tanggal']);
        $query .= " AND penilaian.tanggal = '$tanggal'";
    }

    $query .= " ORDER BY penilaian.result DESC";

    $data = mysqli_query($conn->koneksi, $query);
    $hasil = [];
    while ($d = mysqli_fetch_object($data)) {
        $hasil[] = $d;
    }

    return $hasil;
}

    
    
    public function TampilNilai($IdKategori){
        $conn = new database();
        
        $query = "SELECT penilaian.*, juri.Username, peserta.nama_anjing, peserta.handler, 
                         peserta.nama_pemilik, peserta.size
                  FROM penilaian 
                  INNER JOIN juri ON penilaian.IdJuri = juri.IdJuri 
                  INNER JOIN peserta ON penilaian.no_peserta = peserta.no_peserta
                  WHERE penilaian.IdKategori = $IdKategori ORDER BY result DESC";
        $data = mysqli_query($conn->koneksi, $query);
        
        $hasil = [];
        while ($d = mysqli_fetch_object($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }

public function TambahNilai($status, $waktu_tempuh, $fault, $refusal, $result, $kelas, $tanggal, $IdKategori, $no_peserta, $IdJuri) {
    $conn = new database();
    
    // Tambahkan koma setelah '$no_peserta'
    $sql = "INSERT INTO penilaian VALUES (NULL, '$status', '$waktu_tempuh', '$fault', '$refusal', '$result', '$kelas', '$tanggal', '$IdKategori', '$no_peserta', $IdJuri)";
    
    $queryResult = mysqli_query($conn->koneksi, $sql);
    
    
}
    
}