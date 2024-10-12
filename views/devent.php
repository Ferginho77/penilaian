<?php 
include_once '../views/layouts/header.php'; 
include_once '../controllers/c_kategori.php';
include_once '../controllers/c_peserta.php';
include_once '../controllers/c_nilai.php';

$tampil = new C_kategori();
$peserta = new C_peserta();
$nilai = new C_nilai();
?>

<style>
    /* Gaya Umum untuk Halaman */
    .container {
        padding: 20px;
    }

    .half-page {
        height: 50vh; /* Setengah tinggi viewport */
        overflow-y: auto; /* Tambahkan scrollbar jika konten melebihi tinggi */
    }

    /* Gaya untuk Tabel */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    table thead {
        background-color: #007bff;
        color: #fff;
    }

    table th, table td {
        padding: 15px; /* Padding untuk spasi lebih besar */
        text-align: center; /* Rata tengah teks */
        border: 1px solid #dee2e6; /* Border untuk setiap sel */
    }

    table tbody tr:hover {
        background-color: #f1f1f1; /* Background hover untuk baris tabel */
        transition: background-color 0.2s ease;
    }

    /* Gaya untuk Tombol */
    .btn {
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn-primary, .btn-outline-info {
        background-color: #007bff;
        border-color: #007bff;
        color: white;
    }

    .btn-primary:hover, .btn-outline-info:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #c82333;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-success:hover {
        background-color: #218838;
        border-color: #218838;
    }

    /* Gaya untuk form upload CSV */
    .upload-form {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 10px;
    }

    .upload-form label {
        cursor: pointer; /* Mengubah cursor ketika mouse berada di atas label */
    }

    .upload-form input[type="file"] {
        display: none; /* Menyembunyikan input file asli */
    }

    .download-btn {
        display: flex;
        align-items: center;
        gap: 5px; /* Jarak antara ikon dan teks */
    }

    /* Gaya untuk Modal */
    .modal {
        display: none; /* Tersembunyi secara default */
        position: fixed; /* Menggunakan posisi tetap */
        z-index: 1000; /* Di atas konten lain */
        left: 0;
        top: 0;
        width: 100%; /* Lebar penuh */
        height: 100%; /* Tinggi penuh */
        overflow: auto; /* Scroll jika perlu */
        background-color: rgba(0, 0, 0, 0.5); /* Latar belakang semi-transparan */
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto; /* 15% dari atas dan otomatis di kiri/kanan */
        padding: 20px;
        border: 1px solid #888;
        width: 80%; /* Lebar modal */
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<main>
    <!-- Data Peserta -->
    <div class="half-page">
        <div class="card mt-5 shadow-sm">
            <div class="card-header bg-info text-white text-center">
                <h3>Data Peserta</h3>
                <form id="uploadForm" action="upload_csv.php" method="post" enctype="multipart/form-data" class="upload-form">
                    <label for="file_csv" class="btn btn-primary">
                        <i class="fas fa-upload me-2"></i> Upload CSV
                    </label>
                    <input type="file" id="file_csv" name="file_csv" accept=".csv" required>
                    <button type="submit" class="btn btn-primary" style="display: none;">Upload CSV</button>
                </form>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th><i class="fas fa-dog me-2"></i>Nama Anjing</th>
                            <th><i class="fas fa-user me-2"></i>Nama Pemilik</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $event = $peserta->Tampilpeserta($_GET['IdKategori']);
                    if (empty($event)) {
                        echo "<tr><td colspan='3' class='text-center'>Tidak ada data tersedia</td></tr>";
                    } else {
                        foreach ($event as $x) : 
                    ?>           
                    <tr>
                        <td><?= $x->nama_anjing ?></td>
                        <td><?= $x->nama_pemilik ?></td>
                        <td>
                            <a onclick="return confirm('Apakah yakin data akan dihapus?')" href="../routers/r_peserta.php?no_peserta=<?= $x->no_peserta ?>&IdKategori=<?= $x->IdKategori ?>&aksi=hapus" class="btn btn-danger">
                                <i class="far fa-trash-alt"></i> Hapus
                            </a>
                            <a href="nilai.php?no_peserta=<?= $x->no_peserta ?>" class="btn btn-outline-info">
                                <i class="fas fa-check-circle me-1"></i>Pilih
                            </a>
                        </td>
                    </tr>   
                    <?php endforeach ?>
                    <?php } ?>  
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Result -->
    <div class="half-page">
        <div class="card mt-5 shadow-sm">
            <div class="card-header bg-info text-white text-center">
                <h3>RESULT</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                        <td><i class="fa-solid fa-shield-dog"></i> ID Peserta </td>
                        <td><i class="fa-solid fa-dog"></i> Nama Anjing</td>
                        <td><i class="fa-regular fa-user"></i> Nama Pemilik </td>
                        <td><i class="fa-regular fa-user"></i> Handler</td>
                        <td><i class="fa-solid fa-paw"></i> Size</td>
                        <td><i class="fa-solid fa-trophy"></i> Kelas</td>
                        <td><i class="fa-solid fa-stopwatch"></i> Waktu Tempuh</td>
                        <td><i class="fa-solid fa-check"></i> Status</td>
                        <td><i class="fa-regular fa-circle-xmark"></i> Fault</td>
                        <td><i class="fa-solid fa-triangle-exclamation"></i> Refusal</td>
                        <td><i class="fa-solid fa-square-poll-vertical"></i> Result</td>
                        <td><i class="fa-regular fa-calendar"></i> Tanggal</td>
                        <td><i class="fa-regular fa-user"></i> Juri</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $event = $nilai->TampilNilai($_GET['IdKategori']);
                    if (!empty($event)) {
                        foreach ($event as $x) : 
                    ?>   
                        <tr>
                        <td><?= $x->no_peserta ?></td>
                <td><?= $x->nama_anjing ?></td>
                <td><?= $x->nama_pemilik ?></td>
                <td><?= $x->handler ?></td>
                <td><?= $x->size ?></td>
                <td><?= $x->kelas ?></td>
                <td><?= $x->waktu_tempuh ?></td>
                <td><?= $x->status ?></td>
                <td><?= $x->fault ?></td>
                <td><?= $x->refusal ?></td>
                <td><?= $x->result ?></td>
                <td><?= $x->tanggal ?></td>
                <td><?= $x->Username ?></td>
                        </tr>
                    <?php 
                        endforeach;
                    } else {
                        echo "<tr><td colspan='7' class='text-center'>Tidak ada data tersedia</td></tr>";
                    } 
                    ?>  
                    </tbody>
                </table>
                <a href="export_to_excel.php?IdKategori=<?= $_GET['IdKategori'] ?>" class="btn btn-success mb-3 download-btn">
                    <i class="fas fa-file-download"></i> Download
                </a>
            </div>
        </div>
    </div>
</main>

<!-- Modal untuk Gagal Upload -->
<div id="errorModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModal">&times;</span>
        <h2>Gagal Upload</h2>
        <p id="errorMessage">Data gagal diupload. Silakan coba lagi.</p>
    </div>
</div>

<script>
    document.getElementById('uploadForm').onsubmit = function(event) {
        event.preventDefault(); // Mencegah pengalihan halaman

        var formData = new FormData(this);

        fetch('upload_csv.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            if (data.includes("berhasil diupload")) { // Cek apakah upload berhasil
                location.reload(); // Menyegarkan halaman setelah upload berhasil
            } else {
                showErrorModal(data); // Tampilkan modal error jika gagal
            }
        })
        .catch(error => {
            showErrorModal('Gagal mengupload: ' + error); // Tampilkan modal error
        });
    };

    function showErrorModal(message) {
        document.getElementById('errorMessage').innerText = message; // Set pesan error
        document.getElementById('errorModal').style.display = 'block'; // Tampilkan modal
    }

    // Menutup modal
    document.getElementById('closeModal').onclick = function() {
        document.getElementById('errorModal').style.display = 'none'; // Sembunyikan modal
    };

    window.onclick = function(event) {
        if (event.target == document.getElementById('errorModal')) {
            document.getElementById('errorModal').style.display = 'none'; // Sembunyikan modal jika klik di luar modal
        }
    };
</script>

<!-- Pastikan untuk menyertakan Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<?php include_once 'layouts/footer.php'; ?>