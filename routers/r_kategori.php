<?php 

require_once '../controllers/c_kategori.php';

$kategori = new C_kategori();

// Cek aksi dari query string
if(isset($_GET['aksi'])) {
    // Aksi tambah
    if ($_GET['aksi'] == 'tambah') {
        if (isset($_POST['tambah'])) {
            $NamaEvent = $_POST['NamaEvent'];
            $Deskripsi = $_POST['Deskripsi'];
            $kategori->Tambahkategori($NamaEvent, $Deskripsi);
        }
    }

    // Aksi hapus
    if ($_GET['aksi'] == 'hapus') {
        $IdKategori = $_GET['IdKategori'];
        $result = $kategori->hapus($IdKategori);

        if ($result) {
            header("Location: ../views/kategori.php");
        } else {
            echo "<script>alert('Data Gagal Dihapus');window.location='../views/kategori.php'</script>";
        }
    }
}
