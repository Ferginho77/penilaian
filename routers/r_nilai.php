<?php 

require_once '../controllers/c_nilai.php';

$nilai = new C_nilai();

if(isset($_GET['aksi'])) {
    // Aksi tambah
    if ($_GET['aksi'] == 'tambah') {
        if (isset($_POST['tambah'])) {
            $timestamp = $_POST['timestamp'];
            $status = $_POST['status'];
            $waktu_tempuh = $_POST['waktu_tempuh'];
            $fault = $_POST['fault'];
            $refusal = $_POST['refusal'];
            $result = $_POST['result'];
            $IdKategori = $_POST['IdKategori'];
            $no_peserta = $_POST['no_peserta'];
          
        
            $nilai->TambahNilai( $timestamp, $status, $waktu_tempuh, $fault, $refusal, $result, $IdKategori, $no_peserta);
            if ($nilai) {
                header("Location: ../views/devent.php?IdKategori=$IdKategori");
            } else {
                echo "<script>alert('Data Gagal Ditambah');window.location='../views/devent.php'</script>";
            }
        }
    }
}