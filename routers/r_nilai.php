<?php 

require_once '../controllers/c_nilai.php';

$nilai = new C_nilai();

if(isset($_GET['aksi'])) {
    // Aksi tambah
    if ($_GET['aksi'] == 'tambah') {
        if (isset($_POST['tambah'])) {
            $status = $_POST['status'];
            $waktu_tempuh = $_POST['waktu_tempuh'];
            $fault = $_POST['fault'];
            $refusal = $_POST['refusal'];
            $result = $_POST['result'];
            $kelas = $_POST['kelas'];
            $tanggal = date("Y-m-d");
            $IdKategori = $_POST['IdKategori'];
            $no_peserta = $_POST['no_peserta'];
            $IdJuri = $_POST['IdJuri'];
          
        
            $nilai->TambahNilai(  $status, $waktu_tempuh, $fault, $refusal, $result, $kelas, $tanggal, $IdKategori, $no_peserta, $IdJuri);
            if ($nilai) {
                header("Location: ../views/devent.php?IdKategori=$IdKategori");
            } else {
                echo "<script>alert('Data Gagal Ditambah');window.location='../views/devent.php'</script>";
            }
        }
    }
}
