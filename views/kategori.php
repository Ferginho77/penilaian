<?php 
include_once '../views/layouts/header.php'; 
require_once '../controllers/c_kategori.php';

$tampil = new C_kategori();

// Ambil keyword pencarian jika ada
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// Ambil halaman saat ini jika ada
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5; // Jumlah entri per halaman
$offset = ($page - 1) * $limit;
?>

<main>
<div class="container mt-5">
    <div class="row">
        <!-- Form Tambah Event -->
        <div class="col-md-4">
            <div class="card mt-2 shadow-sm">
                <div class="card-header bg-info text-white">
                    <h5>Tambah Event</h5>
                </div>
                <div class="card-body">
                    <form action="../routers/r_kategori.php?aksi=tambah" method="POST">
                        <div class="form-group">
                            <label for="NamaEvent">Nama Event</label>
                            <input type="text" name="NamaEvent" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="Deskripsi">Deskripsi</label>
                            <textarea name="Deskripsi" class="form-control" rows="4" required></textarea>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-outline-info mt-3">Tambah Event</button>
                    </form>
                </div>  
            </div>
        </div>

        <!-- Data Event -->
        <div class="col-md-8">
            <div class="card mt-2 shadow-sm">
                <div class="card-header bg-info text-white">
                    <h5>Data Event</h5>
                </div>
                <div class="card-body">
                    <!-- Form Pencarian -->
                    <form action="kategori.php" method="get" class="mb-3">
                        <div class="input-group">
                            <input type="text" name="keyword" class="form-control" placeholder="Cari event..." value="<?= htmlspecialchars($keyword) ?>" style="max-width: 200px;">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </div>
                        </div>
                    </form>
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th><i class="fas fa-calendar-alt me-2"></i>Nama Event</th>
                                <th><i class="fas fa-align-left me-2"></i>Deskripsi</th>
                                <th style="width: 100px;"><i class="fas fa-cogs me-2"></i>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $event = $tampil->tampil_data();
                                $filtered_event = array_filter($event, function($x) use ($keyword) {
                                    return stripos($x->NamaEvent, $keyword) !== false;
                                });

                                if (empty($keyword)) {
                                    $filtered_event = $event;
                                }

                                $total_event = count($filtered_event);
                                $filtered_event = array_slice($filtered_event, $offset, $limit);

                                if (empty($filtered_event)) {
                                    echo "<tr><td colspan='3' class='text-center'>Data tidak tersedia</td></tr>";
                                } else {
                                    foreach ($filtered_event as $x) : 
                            ?>  
                            <tr>
                                <td><?= htmlspecialchars($x->NamaEvent) ?></td>
                                <td><?= htmlspecialchars($x->Deskripsi) ?></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="<?= $x->IdKategori ?>">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach ?>
                            <?php }?>   
                        </tbody>
                    </table>
                    <!-- Pagination -->
                    <nav>
                        <ul class="pagination justify-content-center">
                            <?php 
                                $total_pages = ceil($total_event / $limit);
                                for ($i = 1; $i <= $total_pages; $i++) {
                                    $active = ($i == $page) ? 'active' : '';
                                    echo "<li class='page-item $active'><a class='page-link' href='kategori.php?page=$i&keyword=$keyword'>$i</a></li>";
                                }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus event ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="#" id="confirmDelete" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>

</main>

<script>
    // Mengambil elemen modal dan tombol hapus
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Tombol yang memicu modal
        var id = button.data('id'); // Ambil ID dari data-id

        // Ubah URL pada tombol konfirmasi
        var modal = $(this);
        modal.find('#confirmDelete').attr('href', '../routers/r_kategori.php?IdKategori=' + id + '&aksi=hapus');
    });
</script>

<!-- Pastikan Anda sudah menyertakan jQuery dan Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
    /* Gaya Umum untuk Tabel */
    table {
        margin-top: 20px; /* Jarak atas tabel */
    }

    tbody tr:hover {
        background-color: #f5f5f5; /* Warna latar belakang saat hover */
    }

    .table th, .table td {
        vertical-align: middle; /* Memastikan isi sel rata tengah secara vertikal */
        padding: 15px; /* Padding pada sel tabel */
    }
</style>
<?php include_once 'layouts/footer.php'; ?>
