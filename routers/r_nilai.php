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
            $no_peserta = $_POST['no_peserta'];
            $IdKategori = $_POST['IdKategori'];
        
            $nilai->TambahNilai( $timestamp, $status, $waktu_tempuh, $fault, $refusal, $result, $no_peserta, $IdKategori);
           
        }
    }
}