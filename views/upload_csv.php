<?php
// Koneksi ke database
include_once '../config/database.php'; // Pastikan Anda memiliki file koneksi database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['file_csv']) && $_FILES['file_csv']['error'] == 0) {
        $file = $_FILES['file_csv']['tmp_name'];
        
        // Membaca file CSV
        if (($handle = fopen($file, 'r')) !== FALSE) {
            fgetcsv($handle); // Mengabaikan header
            
            // Menyiapkan query untuk insert
            $query = "INSERT INTO peserta (no_peserta, nama_anjing, nama_pemilik, handler, size, kelas, IdKategori, IdJuri) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $success = true; // Flag untuk mengecek keberhasilan

            while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                if (count($data) == 8) {
                    // Bind parameter
                    $no_peserta = $data[0];
                    $nama_anjing = $data[1];
                    $nama_pemilik = $data[2];
                    $handler = $data[3];
                    $size = $data[4];
                    $kelas = $data[5];
                    $IdKategori = (int)$data[6];
                    $IdJuri = (int)$data[7];

                    $stmt->bind_param("issssiii", $no_peserta, $nama_anjing, $nama_pemilik, $handler, $size, $kelas, $IdKategori, $IdJuri);
                    
                    // Eksekusi dan periksa kesalahan
                    if (!$stmt->execute()) {
                        $success = false; // Set flag gagal
                    }
                }
            }
            fclose($handle);
            if ($success) {
                echo "Data berhasil diupload.";
            } else {
                echo "Gagal mengupload beberapa data.";
            }
        } else {
            echo "Gagal membuka file.";
        }
    } else {
        echo "Tidak ada file yang diupload atau terjadi kesalahan.";
    }
} else {
    echo "Metode tidak diizinkan.";
}
?>