<?php 
include_once 'layouts/header.php'; 
require_once '../controllers/c_nilai.php';
require_once '../controllers/c_user.php';

$nilai = new C_nilai();
$juri = new C_user();

?>

<main>
<div class="half-page">
    <div class="card mt-5 shadow-sm">
        <div class="card-header bg-info text-white text-center">
            <h3>HASIL AKHIR PERTANDINGAN</h3>
            <div class="row">
                <div class="col-md-5">
                    <h4>Cari Rangking</h4>
                </div>
                <div class="col-md-7">
                <form action="" method="get">
    <input type="hidden" name="IdKategori" value="<?= isset($_GET['IdKategori']) ? $_GET['IdKategori'] : '' ?>">
    <div class="row">
        <div class="col-md-4">
            <select name="status" class="form-control">
                <option value="">Filter Rangking</option>
                <option value="small" <?= isset($_GET['status']) && $_GET['status'] == 'small' ? 'selected' : '' ?>>Small</option>
                <option value="medium" <?= isset($_GET['status']) && $_GET['status'] == 'medium' ? 'selected' : '' ?>>Medium</option>
                <option value="large" <?= isset($_GET['status']) && $_GET['status'] == 'large' ? 'selected' : '' ?>>Large</option>
                <option value="intermediate" <?= isset($_GET['status']) && $_GET['status'] == 'intermediate' ? 'selected' : '' ?>>Intermediate</option>

            </select>
            <select name="kelas" class="form-control">
                <option value="">Filter Kelas</option>
                <option value="A1" <?= isset($_GET['kelas']) && $_GET['kelas'] == 'A1' ? 'selected' : '' ?>>A1</option>
                <option value="A2" <?= isset($_GET['kelas']) && $_GET['kelas'] == 'A2' ? 'selected' : '' ?>>A2</option>
                <option value="J1" <?= isset($_GET['kelas']) && $_GET['kelas'] == 'J1' ? 'selected' : '' ?>>J1</option>
                <option value="J2" <?= isset($_GET['kelas']) && $_GET['kelas'] == 'J2' ? 'selected' : '' ?>>J2</option>
                <option value="FA1" <?= isset($_GET['kelas']) && $_GET['kelas'] == 'FA1' ? 'selected' : '' ?>>FA1</option>
                <option value="FA2" <?= isset($_GET['kelas']) && $_GET['kelas'] == 'FA2' ? 'selected' : '' ?>>FA2</option>
            </select>
            <select name="juri" class="form-control">
    <option value="">Filter Juri</option>
    <?php 
    $dataJurors = $nilai->Tampilresult(['IdKategori' => $_GET['IdKategori']]);

    $juris_selected = [];
    
    foreach ($dataJurors as $x) : 
        if (!in_array($x->IdJuri, $juris_selected)) {
            $juris_selected[] = $x->IdJuri; 
            ?>
            <option value="<?= $x->IdJuri ?>" <?= isset($_GET['juri']) && $_GET['juri'] == $x->IdJuri ? 'selected' : '' ?>><?= $x->Username ?></option>
            <?php 
        }
    endforeach; 
    ?>
</select>




        </div>
        <div class="col-md-4">
            <input type="date" name="tanggal" value="<?= isset($_GET['tanggal']) ? $_GET['tanggal'] : '' ?>" class="form-control">
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-outline-warning">Cari</button>
            <a href="rangking.php?IdKategori=<?= $_GET['IdKategori'] ?>" class="btn btn-outline-danger">Reset</a>
        </div>
    </div>
</form>

                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                    <td><i class="fa-solid fa-award"></i> Rangking</td>
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
                    // Mengirimkan data filter untuk mengambil hasil yang sesuai
                    $filters = [
                        'IdKategori' => $_GET['IdKategori'] ?? '',
                        'status' => $_GET['status'] ?? '',
                        'tanggal' => $_GET['tanggal'] ?? ''
                    ];

                    $event = $nilai->Tampilresult($filters);
                    if (!empty($event)) {
                        $i = 1;
                        foreach ($event as $x) {
                    ?>
                            <tr>
                                <td><?= $i ?></td>
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
                            $i++;
                        }
                    } else {
                        echo "<tr><td colspan='14' class='text-center'>Tidak ada data tersedia</td></tr>";
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
<?php include_once 'layouts/footer.php'; ?>
