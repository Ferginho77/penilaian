<?php 
include_once 'layouts/header.php';
require_once '../controllers/conn.php'; 
require_once '../controllers/c_kategori.php'; 
require_once '../controllers/c_peserta.php'; 
require_once '../controllers/c_user.php'; 

$kategori = new C_kategori();
$peserta = new C_peserta();
$user = new C_user();

$total_kategori = $kategori->hitung_kategori();
$total_peserta = $peserta->hitung_peserta();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - PERKIN</title>
    <link rel="stylesheet" href="../assets/css/dcss.css"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
      
    </style>
</head>
<body>
<main>
    <div class="container mt-5">
        <h1 class="text-center">Dashboard</h1>

        <!-- Bagian Tentang Kami -->
        <div class="position-relative mb-4">
            <div class="card about-card border-secondary">
                <h2 class="text-center">Tentang Kami</h2>
                <p class="text-center">
                    PERKUMPULAN KINOLOGI INDONESIA (PERKIN) adalah organisasi yang menjadi induk organisasi penggemar anjing ras di Indonesia. Kami berdedikasi untuk mempromosikan dan melestarikan anjing ras di Indonesia melalui berbagai kegiatan dan acara. Kami juga menyediakan berbagai layanan untuk anggota kami, termasuk pendaftaran anjing, pelatihan, dan kompetisi.
                </p>
            </div>
        </div>

        <!-- Informasi Total Event dan Peserta -->
        <div class="row">
            <div class="col-md-4">
                <div class="card border-secondary text-center mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Total Event</h5>
                        <h1><?php echo $total_kategori; ?></h1>
                        <span class="symbol"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-secondary text-center mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Total Peserta</h5>
                        <h1><?php echo $total_peserta; ?></h1>
                        <span class="symbol"><i class="fas fa-user-friends"></i></span>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <!-- Kosong, bisa diisi konten lain -->
            </div>
        </div>
    </div>
</main>

<?php include_once 'layouts/footer.php'; ?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Pastikan Font Awesome sudah dimasukkan -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</body>
</html>
