<?php 
include_once 'layouts/header.php'; 
require_once '../controllers/c_kategori.php';

$tampil = new C_kategori();

// Array gambar acak
$gambar_acak = [
    '../assets/img/snowdog.jpg',
    '../assets/img/browndog.jpg',
    '../assets/img/sadog.jpg',
];

// Ambil keyword pencarian jika ada
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
?>

<main>
    <div class="container">
        <h1 class="text-white text-center mb-5">Daftar Rangking</h1>
        
        <!-- Form Pencarian -->
        <form action="data.php" method="get" class="mb-4">
            <div class="input-group" style="max-width: 300px; margin: 0 auto;">
                <input type="text" name="keyword" class="form-control" placeholder="Cari rangking event..." value="<?= htmlspecialchars($keyword) ?>">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
        <div class="row">
            <?php 
            $event = $tampil->tampil_data();
            if (empty($event)) {
                echo "<p class='text-white text-center'>Tidak ada data tersedia</p>";
            } else {
                $filtered_event = array_filter($event, function($x) use ($keyword) {
                    return stripos($x->NamaEvent, $keyword) !== false;
                });

                if (empty($keyword)) {
                    $filtered_event = $event;
                }

                if (empty($filtered_event)) {
                    echo "<script>
                            $(document).ready(function(){
                                $('#notFoundModal').modal('show');
                            });
                          </script>";
                } else {
                    foreach ($filtered_event as $x) : 
                        // Pilih gambar acak untuk setiap event
                        $gambar_terpilih = $gambar_acak[array_rand($gambar_acak)];
            ?>  
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow" style="background-image: url('<?= $gambar_terpilih ?>'); background-size: cover; background-position: center;">
                            <div class="card-body d-flex flex-column" style="background-color: rgba(255, 255, 255, 0.8);">
                                <h5 class="card-title font-weight-bold"><?= $x->NamaEvent ?></h5>
                                <p class="card-text flex-grow-1"><?= $x->Deskripsi ?></p>
                                <a href="rangking.php?IdKategori=<?= $x->IdKategori ?>" class="btn btn-outline-primary mt-auto btn-block">
                                    <i class="fas fa-search me-1"></i> Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
            <?php 
                    endforeach;
                }
            }
            ?>   
        </div>
    </div>
</main>
<?php include_once 'layouts/footer.php'; ?>