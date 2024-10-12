<?php 

include_once 'conn.php';

class C_peserta {
    public function TambahPeserta($nama_anjing, $nama_pemilik, $handler, $size, $kelas, $IdKategori, $IdJuri) {
        $conn = new database();
        $sql = "INSERT INTO peserta VALUES (NULL, '$nama_anjing', '$nama_pemilik', '$handler', '$size', '$kelas', '$IdKategori', '$IdJuri')";
           
        $result = mysqli_query($conn->koneksi, $sql);
        
    }

    public function Tampilpeserta($IdKategori){
        $conn = new database();
        
        $query = "SELECT * FROM peserta WHERE IdKategori = $IdKategori";
        $data = mysqli_query($conn->koneksi, $query);
        
        $hasil = [];
        while ($d = mysqli_fetch_object($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }
    public function hapus($no_peserta)
	{
		$conn = new database();
		$sql = "DELETE FROM peserta WHERE no_peserta = $no_peserta";
		$result = mysqli_query($conn->koneksi, $sql);
		return $result;
        
	}

    public function SelectPeserta($no_peserta) {
        $conn = new database();
        
        $query = "SELECT * FROM peserta WHERE no_peserta = $no_peserta";
        $data = mysqli_query($conn->koneksi, $query);
        
        $hasil = [];
        while ($d = mysqli_fetch_object($data)) {
            $hasil[] = $d;
        }
        return $hasil;
    }

    // Fungsi untuk menghitung total peserta
    public function hitung_peserta() {
        $conn = new database();
        $data = mysqli_query($conn->koneksi, "SELECT COUNT(*) as total FROM peserta");
        $hasil = mysqli_fetch_object($data);
        return $hasil->total;
    }
}